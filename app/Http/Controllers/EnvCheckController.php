<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvCheckController extends Controller
{
    public function check()
    {
        $clientId = env('AZURE_CLIENT_ID');
        $clientSecret = env('AZURE_CLIENT_SECRET');
        $email = env('EMAIL');
        $password = env('PASSWORD');

        return response()->json([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'email' => $email,
            'password' => $password
        ]);
    }
}
