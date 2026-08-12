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
            // Mujer + Principiante + Bajar de peso (2 variantes para el seeder)
            ['nombre' => 'Rutina Quema Grasa Principiante A', 'genero' => 'Femenino', 'nivel_entrenamiento' => 'Principiante', 'objetivo' => 'Bajar de peso', 'videos' => [['id' => 22, 'day' => 'General', 'title' => 'Cardio HIIT Suave', 'duration' => '20 min', 'filename' => 'cardio.mp4']]],
            ['nombre' => 'Rutina Quema Grasa Principiante B', 'genero' => 'Femenino', 'nivel_entrenamiento' => 'Principiante', 'objetivo' => 'Bajar de peso', 'videos' => [['id' => 23, 'day' => 'General', 'title' => 'Circuito Máquinas Básicas', 'duration' => '25 min', 'filename' => 'circuito.mp4']]],
            
            // Default fallback
            ['nombre' => 'Rutina General Mantenimiento', 'genero' => null, 'nivel_entrenamiento' => null, 'objetivo' => null, 'videos' => [['id' => 7, 'title' => 'Acondicionamiento Físico Base', 'duration' => '30 min']]],
        ];

        foreach ($rutinas as $r) {
            \App\Models\Rutina::create($r);
        }
    }
}
