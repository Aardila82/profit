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
        $baseDir = 'videos';

        if (!Storage::disk('local')->exists($baseDir)) {
            $this->error("La carpeta storage/app/{$baseDir} no existe.");
            return;
        }

        // 1. Nivel de Género (hombre / mujer)
        $generos = Storage::disk('local')->directories($baseDir);
        foreach ($generos as $generoDir) {
            $genero = basename($generoDir); 
            $generoStr = $genero === 'hombre' ? 'Masculino' : 'Femenino';

            // 2. Nivel de Entrenamiento (avanzado / principiante)
            $niveles = Storage::disk('local')->directories($generoDir);
            foreach ($niveles as $nivelDir) {
                $nivel = basename($nivelDir);
                $nivelStr = ucfirst($nivel);

                // 3. Objetivo (aumento_masa / tono)
                $objetivos = Storage::disk('local')->directories($nivelDir);
                foreach ($objetivos as $objetivoDir) {
                    $objetivo = basename($objetivoDir);
                    $objetivoStr = Str::title(str_replace('_', ' ', $objetivo));

                    // 4. Rutinas (rutina1, rutina2, etc.)
                    $rutinas = Storage::disk('local')->directories($objetivoDir);
                    foreach ($rutinas as $rutinaDir) {
                        $rutina = basename($rutinaDir); // rutina1
                        $rutinaNum = str_replace('rutina', '', $rutina);
                        
                        $nombreRutina = "Rutina {$rutinaNum} - {$objetivoStr} {$nivelStr}";
                        $videosArray = [];

                        // 5. Días (dia1, dia2, etc.)
                        $dias = Storage::disk('local')->directories($rutinaDir);
                        foreach ($dias as $diaDir) {
                            $dia = basename($diaDir); // dia1
                            $diaNum = str_replace('dia', '', $dia);

                            // 6. Músculos (pecho, espalda, etc.)
                            $musculos = Storage::disk('local')->directories($diaDir);
                            $musculosNombres = array_map(function($m) {
                                return strtoupper(basename($m));
                            }, $musculos);
                            
                            // Construye el título de las pestañas automáticamente: ej. "DÍA 1 PECHO - ESPALDA"
                            $musculosStr = implode(' - ', $musculosNombres);
                            $dayLabel = trim("DÍA {$diaNum} {$musculosStr}");

                            foreach ($musculos as $musculoDir) {
                                // 7. Videos (.mp4)
                                $archivos = Storage::disk('local')->files($musculoDir);
                                
                                foreach ($archivos as $archivo) {
                                    if (Str::endsWith(strtolower($archivo), '.mp4')) {
                                        $filename = basename($archivo, '.mp4');
                                        // Limpia el nombre del video (ej. press_maquina -> Press Maquina)
                                        $title = Str::title(str_replace('_', ' ', $filename));
                                        
                                        // Quitar el 'videos/' del principio de la ruta
                                        $rutaRelativa = Str::after($archivo, 'videos/');

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
