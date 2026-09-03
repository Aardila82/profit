<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Rutina;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Signature('videos:sync')]
#[Description('Escanea la carpeta de videos y sincroniza las rutinas en la BD automáticamente')]
class SyncVideosCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando sincronización automática de videos...');
        $baseDir = storage_path('app/videos');

        if (!\Illuminate\Support\Facades\File::exists($baseDir)) {
            $this->error("La carpeta {$baseDir} no existe.");
            return;
        }

        // 1. Nivel de Género (hombre / mujer)
        $generos = \Illuminate\Support\Facades\File::directories($baseDir);
        foreach ($generos as $generoDir) {
            $genero = basename($generoDir); 
            $generoStr = $genero === 'hombre' ? 'Masculino' : 'Femenino';

            // 2. Nivel de Entrenamiento (avanzado / principiante)
            $niveles = \Illuminate\Support\Facades\File::directories($generoDir);
            foreach ($niveles as $nivelDir) {
                $nivel = basename($nivelDir);
                $nivelStr = ucfirst($nivel);

                // 3. Objetivo (aumento_masa / tono)
                $objetivos = \Illuminate\Support\Facades\File::directories($nivelDir);
                foreach ($objetivos as $objetivoDir) {
                    $objetivo = basename($objetivoDir);
                    $objetivoStr = Str::title(str_replace('_', ' ', $objetivo));

                    // 4. Rutinas (rutina1, rutina2, etc.)
                    $rutinas = \Illuminate\Support\Facades\File::directories($objetivoDir);
                    foreach ($rutinas as $rutinaDir) {
                        $rutina = basename($rutinaDir); // rutina1
                        $rutinaNum = str_replace('rutina', '', $rutina);
                        
                        $nombreRutina = "Rutina {$rutinaNum} - {$objetivoStr} {$nivelStr}";
                        $videosArray = [];

                        // 5. Días (dia1, dia2, etc.)
                        $dias = \Illuminate\Support\Facades\File::directories($rutinaDir);
                        foreach ($dias as $diaDir) {
                            $dia = basename($diaDir); // dia1
                            $diaNum = str_replace('dia', '', $dia);

                            // 6. Músculos (pecho, espalda, etc.)
                            $musculos = \Illuminate\Support\Facades\File::directories($diaDir);
                            $musculosNombres = array_map(function($m) {
                                return strtoupper(basename($m));
                            }, $musculos);
                            
                            // Construye el título de las pestañas automáticamente: ej. "DÍA 1 PECHO - ESPALDA"
                            $musculosStr = implode(' - ', $musculosNombres);
                            $dayLabel = trim("DÍA {$diaNum} {$musculosStr}");

                            foreach ($musculos as $musculoDir) {
                                // 7. Videos (.mp4)
                                $archivos = \Illuminate\Support\Facades\File::files($musculoDir);
                                
                                foreach ($archivos as $archivoInfo) {
                                    $archivo = $archivoInfo->getPathname();
                                    if (Str::endsWith(strtolower($archivo), '.mp4')) {
                                        $filename = basename($archivo, '.mp4');
                                        // Limpia el nombre del video (ej. press_maquina -> Press Maquina)
                                        $title = Str::title(str_replace('_', ' ', $filename));
                                        
                                        // Asegurar que use slash (/) y no backslash (\)
                                        $archivoNormalized = str_replace('\\', '/', $archivo);
                                        // Quitar todo hasta llegar a 'hombre/' o 'mujer/'
                                        $rutaRelativa = Str::after($archivoNormalized, 'videos/');

                                        $videosArray[] = [
                                            'id' => uniqid(), 
                                            'day' => $dayLabel,
                                            'title' => $title,
                                            'duration' => '4 x 12', // Por defecto
                                            'filename' => $rutaRelativa
                                        ];
                                    }
                                }
                            }
                        }

                        // Ordenar los videos para que el día 1 vaya antes que el día 2
                        usort($videosArray, function ($a, $b) {
                            return strcmp($a['day'], $b['day']);
                        });

                        // 8. Guardar en la Base de Datos
                        if (count($videosArray) > 0) {
                            Rutina::updateOrCreate(
                                ['nombre' => $nombreRutina], // Busca por nombre
                                [
                                    'genero' => $generoStr,
                                    'nivel_entrenamiento' => $nivelStr,
                                    'objetivo' => $objetivoStr,
                                    'videos' => $videosArray
                                ]
                            );
                            $this->line("✔ Sincronizada: <info>{$nombreRutina}</info> (" . count($videosArray) . " videos)");
                        }
                    }
                }
            }
        }

        $this->info('¡Proceso completado! Todas las rutinas han sido registradas en la base de datos.');
    }
}
