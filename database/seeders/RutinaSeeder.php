<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rutinas = [
            // Hombre + Avanzado + Aumento de masa muscular (Rutina basada en la tabla enviada)
            [
                'nombre' => 'Rutina 1 - Masa Avanzado (Pecho/Espalda/Pierna)', 
                'genero' => 'Masculino', 
                'nivel_entrenamiento' => 'Avanzado', 
                'objetivo' => 'Aumento masa', 
                'videos' => [
                    // DÍA 1
                    ['id' => 1, 'day' => 'DÍA 1: PECHO/TRICEPS', 'title' => 'Plano Barra (Pecho)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia1/pecho/plano_barra.mp4'],
                    ['id' => 2, 'day' => 'DÍA 1: PECHO/TRICEPS', 'title' => 'Peck Deck (Pecho)', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia1/pecho/peck_deck.mp4'],
                    ['id' => 3, 'day' => 'DÍA 1: PECHO/TRICEPS', 'title' => 'Inclinado Mancuerna (Pecho)', 'duration' => '3 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia1/pecho/inclinado_mancuerna.mp4'],
                    ['id' => 4, 'day' => 'DÍA 1: PECHO/TRICEPS', 'title' => 'Copa (Triceps)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia1/triceps/copa.mp4'],
                    ['id' => 5, 'day' => 'DÍA 1: PECHO/TRICEPS', 'title' => 'Extensión Polea Prono (Triceps)', 'duration' => '3 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia1/triceps/ext_polea prono.mp4'],
                    ['id' => 6, 'day' => 'DÍA 1: PECHO/TRICEPS', 'title' => 'Fondos (Triceps)', 'duration' => '3 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia1/triceps/fondos.mp4'],
                    
                    // DÍA 2
                    ['id' => 7, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Halón Abierto (Espalda)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/espalda/halon_abierto.mp4'],
                    ['id' => 8, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Remo Polea (Espalda)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/espalda/remo_polea.mp4'],
                    ['id' => 9, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Pull Over Mancuerna (Espalda)', 'duration' => '3 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/espalda/pull_over_mancuerna.mp4'],
                    ['id' => 10, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Elevación Lateral Sentado (Hombro)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/hombro/elevacion_lateral_sentado.mp4'],
                    ['id' => 11, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Press Militar Barra Romana (Hombro)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/hombro/press_militar_barra_romana.mp4'],
                    ['id' => 12, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Face Pull (Hombro)', 'duration' => '3 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/hombro/face_pull.mp4'],
                    ['id' => 13, 'day' => 'DÍA 2: ESPALDA/HOMBRO', 'title' => 'Encogimiento de Hombros (Trapecio)', 'duration' => '4 x 20', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia2/trapecio/encogimiento_de_hombros_trapecio.mp4'],

                    // DÍA 3
                    ['id' => 14, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Sentadilla Libre (Pierna)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/pierna/sentadilla_libre.mp4'],
                    ['id' => 15, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Leg Extension (Pierna)', 'duration' => '5 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/pierna/leg_extension.mp4'],
                    ['id' => 16, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Leg Curl Acostado (Pierna)', 'duration' => '5 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/pierna/legcurl_acostado.mp4'],
                    ['id' => 17, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Peso Muerto (Pierna)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/pierna/Peso muerto.mp4'],
                    ['id' => 18, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Pantorrilla Sentado (Pantorrilla)', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/pantorrilla/Pantorrilla sentado.mp4'],
                    ['id' => 19, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Curl Barra Recta (Biceps)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/biceps/curl_barra_recta.mp4'],
                    ['id' => 20, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Martillo Barra Romana (Biceps)', 'duration' => '3 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/biceps/martillo_barra_romana.mp4'],
                    ['id' => 21, 'day' => 'DÍA 3: PIERNA/BICEPS', 'title' => 'Mancuerna Inclinado (Biceps)', 'duration' => '2 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina1/dia3/biceps/inclinado_mancuerna.mp4'],
                ]
            ],
            // Rutina 2 - Hombre + Avanzado + Aumento de masa muscular
            [
                'nombre' => 'Rutina 2 - Masa Avanzado', 
                'genero' => 'Masculino', 
                'nivel_entrenamiento' => 'Avanzado', 
                'objetivo' => 'Aumento masa', 
                'videos' => [
                    // DÍA 1
                    ['id' => 43, 'day' => 'DÍA 1 ESPALDA - PECHO', 'title' => 'Inclinado barra (Pecho)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia1/pecho/inclinado_barra.mp4'],
                    ['id' => 44, 'day' => 'DÍA 1 ESPALDA - PECHO', 'title' => 'Plano mancuerna (Pecho)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia1/pecho/plano_mancuerna.mp4'],
                    ['id' => 45, 'day' => 'DÍA 1 ESPALDA - PECHO', 'title' => 'Fondos (Pecho)', 'duration' => '4 x 8', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia1/pecho/fondos.mp4'],
                    ['id' => 46, 'day' => 'DÍA 1 ESPALDA - PECHO', 'title' => 'Dominadas abierto (Espalda)', 'duration' => '4 x 8', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia1/espalda/dominadas_abierto.mp4'],
                    ['id' => 47, 'day' => 'DÍA 1 ESPALDA - PECHO', 'title' => 'Remo mancuerna (Espalda)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia1/espalda/remo_mancuerna.mp4'],
                    ['id' => 48, 'day' => 'DÍA 1 ESPALDA - PECHO', 'title' => 'Remo máquina (Espalda)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia1/espalda/remo_maquina.mp4'],

                    // DÍA 2
                    ['id' => 22, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Leg Extension (Cuadriceps)', 'duration' => '4x4-5-6 desendente', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/cuadriceps/leg_extension.mp4'],
                    ['id' => 23, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Prensa (Cuadriceps)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/cuadriceps/prensa.mp4'],
                    ['id' => 24, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Sentadilla sissy (Cuadriceps)', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/cuadriceps/sentadilla_sissy.mp4'],
                    ['id' => 25, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Extensión polea lazo (Triceps)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/triceps/ext_polea_lazo.mp4'],
                    ['id' => 26, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Copa (Triceps)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/triceps/copa.mp4'],
                    ['id' => 27, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Press francés (Triceps)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/triceps/press_frances.mp4'],
                    ['id' => 28, 'day' => 'DÍA 2 CUADRICEPS - TRICEPS', 'title' => 'Pantorrilla de pie (Pantorrilla)', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia2/pantorrilla/pantorrilla_de_pie.mp4'],

                    // DÍA 3
                    ['id' => 29, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Press mancuerna (Hombro)', 'duration' => '3 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/hombro/press_mancuerna.mp4'],
                    ['id' => 30, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Elevación lateral mancuerna (Hombro)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/hombro/elevacion_lateral_mancuerna.mp4'],
                    ['id' => 31, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Elevación frontal polea (Hombro)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/hombro/elevacion_frontal_polea.mp4'],
                    ['id' => 32, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Vuelos posteriores máquina (Hombro)', 'duration' => '3 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/hombro/vuelos_posteriores_maquina.mp4'],
                    ['id' => 33, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Encogimiento de hombros (Trapecio)', 'duration' => '4 x 20', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/trapecio/encogimiento_hombros.mp4'],
                    ['id' => 34, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Antebrazo prono', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/antebrazo/antebrazo_prono.mp4'],
                    ['id' => 35, 'day' => 'DÍA 3 HOMBRO - TRAPECIO - ANTEBRAZOS', 'title' => 'Antebrazo supino', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia3/antebrazo/antebrazo_supino.mp4'],

                    // DÍA 4
                    ['id' => 36, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Leg curl sentado (Isquiosurales)', 'duration' => '4 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/isquisurales/leg_curl_sentado.mp4'],
                    ['id' => 37, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Peso muerto (Isquiosurales)', 'duration' => '4 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/isquisurales/peso_muerto.mp4'],
                    ['id' => 38, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Leg curl acostado (Isquiosurales)', 'duration' => '3 x 12', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/isquisurales/leg_curl_acostado.mp4'],
                    ['id' => 39, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Sentadilla búlgara (Isquiosurales)', 'duration' => '3 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/isquisurales/sentadilla_bulgara.mp4'],
                    ['id' => 40, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Curl alterno mancuerna (Biceps)', 'duration' => '4 x 8', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/biceps/curl_alterno_mancuerna.mp4'],
                    ['id' => 41, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Predicador (Biceps)', 'duration' => '4 x 10', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/biceps/predicador.mp4'],
                    ['id' => 42, 'day' => 'DÍA 4 ISQUISURALES - BICEPS', 'title' => 'Martillo lazo polea (Biceps)', 'duration' => '3 x 15', 'filename' => 'hombre/avanzado/aumento_masa/rutina2/dia4/biceps/martillo_lazo_polea.mp4'],
                ]
            ],
            // Mujer + Principiante + Bajar de peso (2 variantes para el seeder)
            ['nombre' => 'Rutina Quema Grasa Principiante A', 'genero' => 'Femenino', 'nivel_entrenamiento' => 'Principiante', 'objetivo' => 'Bajar de peso', 'videos' => [['id' => 22, 'day' => 'General', 'title' => 'Cardio HIIT Suave', 'duration' => '20 min', 'filename' => 'cardio.mp4']]],
            ['nombre' => 'Rutina Quema Grasa Principiante B', 'genero' => 'Femenino', 'nivel_entrenamiento' => 'Principiante', 'objetivo' => 'Bajar de peso', 'videos' => [['id' => 23, 'day' => 'General', 'title' => 'Circuito Máquinas Básicas', 'duration' => '25 min', 'filename' => 'circuito.mp4']]],
            
            // Default fallback
            ['nombre' => 'Rutina General Mantenimiento', 'genero' => null, 'nivel_entrenamiento' => null, 'objetivo' => null, 'videos' => [['id' => 7, 'title' => 'Acondicionamiento Físico Base', 'duration' => '30 min']]],
        ];

        foreach ($rutinas as $r) {
            \App\Models\Rutina::updateOrCreate(
                ['nombre' => $r['nombre']], // Busca por nombre
                $r // Si existe lo actualiza, si no lo crea
            );
        }
    }
}
