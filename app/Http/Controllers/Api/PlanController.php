<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Setting;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('id', 'asc')->get();
        $promoSetting = Setting::where('key', 'promo_banner')->first();
        
        return response()->json([
            'plans' => $plans,
            'promo_banner' => $promoSetting ? $promoSetting->value : null
        ]);
    }

    public function updatePlan(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'equivalent_text' => 'nullable|string',
            'features' => 'required|array',
            'is_popular' => 'required|boolean',
            'whatsapp_text' => 'nullable|string'
        ]);

        $plan = Plan::findOrFail($id);
        $plan->update($request->all());

        // If this plan is set to popular, we should probably unset others (optional UX nice-to-have)
        if ($request->is_popular) {
            Plan::where('id', '!=', $id)->update(['is_popular' => false]);
        }

        return response()->json(['message' => 'Plan actualizado', 'plan' => $plan]);
    }

    public function updateSetting(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'promo_banner' => 'nullable|string'
        ]);

        Setting::updateOrCreate(
            ['key' => 'promo_banner'],
            ['value' => $request->promo_banner]
        );

        return response()->json(['message' => 'Configuración actualizada']);
    }
}
