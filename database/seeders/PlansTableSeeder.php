<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => 'promo_banner'],
            ['value' => '🔥 <span className="text-primary font-bold uppercase">Promoción del Mes:</span> Inscríbete hoy y no pagas inscripción. ¡Cupos limitados! 🔥']
        );

        \App\Models\Plan::updateOrCreate(
            ['name' => 'Mensual'],
            [
                'price' => 60000,
                'equivalent_text' => '/mes',
                'features' => ['Acceso a todas las máquinas', 'Zonas de cardio y pesas', 'Horario libre'],
                'is_popular' => false,
                'whatsapp_text' => 'Hola, me interesa el plan Mensual'
            ]
        );

        \App\Models\Plan::updateOrCreate(
            ['name' => 'Trimestral'],
            [
                'price' => 150000,
                'equivalent_text' => 'Equivale a $50.000 /mes',
                'features' => ['Todo lo del plan mensual', 'Evaluación física inicial', 'Congelamiento por 1 semana'],
                'is_popular' => true,
                'whatsapp_text' => 'Hola, me interesa el plan Trimestral'
            ]
        );

        \App\Models\Plan::updateOrCreate(
            ['name' => 'Semestral'],
            [
                'price' => 270000,
                'equivalent_text' => 'Equivale a $45.000 /mes',
                'features' => ['Todo lo del plan trimestral', 'Acceso a clases grupales', 'Congelamiento por 2 semanas'],
                'is_popular' => false,
                'whatsapp_text' => 'Hola, me interesa el plan Semestral'
            ]
        );

        \App\Models\Plan::updateOrCreate(
            ['name' => 'Anual'],
            [
                'price' => 500000,
                'equivalent_text' => 'Equivale a $41.600 /mes',
                'features' => ['Todo lo del plan semestral', 'Rutina personalizada mensual', 'Congelamiento por 1 mes'],
                'is_popular' => false,
                'whatsapp_text' => 'Hola, me interesa el plan Anual'
            ]
        );
    }
}
