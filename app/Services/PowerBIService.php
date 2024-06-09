<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class PowerBIService
{
    public function getPowerBIEmbedToken($reportId, $datasetId)
    {
        $clientId = env('AZURE_CLIENT_ID');
        $clientSecret = env('AZURE_CLIENT_SECRET');
        $email = env('EMAIL');
        $password = env('PASSWORD');

        if (empty($clientId) || empty($clientSecret) || empty($email) || empty($password)) {
            Log::error('Missing environment variables for Azure authentication');
            throw new \Exception('Missing environment variables for Azure authentication');
        }

        $tokenUrl = "https://login.windows.net/common/oauth2/token";
        $resource = "https://analysis.windows.net/powerbi/api";

        $client = new Client();
        try {
            $response = $client->post($tokenUrl, [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'resource' => $resource,
                    'username' => $email,
                    'password' => $password,
                ],
            ]);
            $responseData = json_decode($response->getBody()->getContents(), true);

            $accessToken = $responseData['access_token'];

            if (isset($accessToken)) {
                $embedTokenUrl = "https://api.powerbi.com/v1.0/myorg/GenerateToken";

                $embedTokenResponse = $client->post($embedTokenUrl, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'datasets' => [
                            [
                                'id' => $datasetId
                            ]
                        ],
                        'reports' => [
                            [
                                'id' => $reportId
                            ]
                        ],
                    ]
                ]);

                return json_decode($embedTokenResponse->getBody()->getContents(), true)['token'];
            } else {
                return null;
            }
        } catch (RequestException $e) {
            // Log the exception and rethrow it
            Log::error('Error generating embed token', ['exception' => $e]);
            throw $e;
        }
    }
}

