<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeApiNotificaciones{

    public function makeRequest($method,$uri){

        $client = new Client();
        $key = config('services.api_notificaciones.key');
        $baseUri = 'https://notificaciones.pspsiche.com/api/notificaciones/';

        $headers = [
            'Accept'        => 'application/json', 
            'Authorization' => 'Bearer ' . $key, 
        ];

        $url = $baseUri . $uri;

        try {
            $response = $client->request($method, $url, [
                'headers' => $headers,
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body);
            return $data;
        
        } catch (Exception $e) {
            // Maneja cualquier excepción que ocurra durante la solicitud
            echo 'Error: ' . $e->getMessage();
        }
    }
}