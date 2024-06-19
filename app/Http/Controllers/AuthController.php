<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Exception;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

class AuthController extends Controller
{
    private $apiUrl;
    private $apiKey;
    private $secretKey;
    private $saltKey;

    public function __construct()
    {
        $this->apiUrl = env('BASE_URL') . '/account/v1/api/login';
        $this->apiKey = env('API_KEY');
        $this->secretKey = env('SECRET_KEY');
        $this->saltKey = env('SALT_KEY');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'npk' => 'required|numeric|digits:5',
            'password' => 'required|string',
        ]);

        $npk = $request->input('npk');
        $password = $request->input('password');

        try {
            // Encrypt NPK and Password
            $encryptedNpk = $this->encrypt($npk);
            $encryptedPassword = $this->encrypt($password);

            // Prepare the payload
            $payload = [
                'npk' => $encryptedNpk,
                'password' => $encryptedPassword
            ];

            // Send the request to the API
            $response = Http::withHeaders([
                'Strict-Transport-Security' => env('STRICT_TRANSPORT_SECURITY'),
                'X-Content-Type-Options' => env('X_CONTENT_TYPE_OPTIONS'),
                'X-Frame-Options' => env('X_FRAME_OPTIONS'),
                'X-XSS-Protection' => env('X_XSS_PROTECTION'),
                'APIKey' => $this->apiKey,
                'Content-Type' => 'application/json'
            ])->post($this->apiUrl, $payload);

            if ($response->successful()) {
                // Assuming the API returns a user object on successful login
                $user = User::where('npk', $npk)->first();
                if ($user) {
                    Auth::login($user);
                    return redirect()->route('home');
                } else {
                    return redirect()->back()->withErrors(['npk' => 'User not found'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['npk' => 'Invalid NPK or password'])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['npk' => 'Error during authentication: ' . $e->getMessage()])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    private function encrypt($input)
    {
        $key = hash_pbkdf2("sha256", $this->secretKey, $this->saltKey, 65536, 16, true);
        $iv = str_repeat(chr(0), 16);

        $encrypted = openssl_encrypt($input, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encrypted);
    }
}
