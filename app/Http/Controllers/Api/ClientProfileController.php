<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientProfileController extends Controller
{
    public function show(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }
}
