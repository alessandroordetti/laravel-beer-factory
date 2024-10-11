<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BreweryController extends Controller
{
    public function listBreweries(Request $request)
    {
        // Inizializza il client Guzzle
        $client = new Client([
            'verify' => false,
        ]);

        // Esegui la richiesta a OpenBreweryDB
        $response = $client->get('https://jsonplaceholder.typicode.com/posts');

        // Decodifica la risposta JSON
        $breweries = json_decode($response->getBody(), true);

        // Restituisci i dati come JSON
        return response()->json($breweries);
    }
}
