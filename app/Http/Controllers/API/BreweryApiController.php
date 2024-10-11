<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class BreweryApiController extends Controller
{
    public function listBreweries(Request $request)
    {
        // Imposta la paginazione predefinita
        $page = $request->query('page', 1);
        $perPage = 10; // Numero di risultati per pagina

        // Inizializza il client Guzzle
        $client = new Client();

        // Esegui la richiesta a OpenBreweryDB
        $response = $client->get('https://api.openbrewerydb.org/v1/breweries');
        

        // Decodifica la risposta JSON
        $breweries = json_decode($response->getBody(), true);

        dd($breweries);

        // Restituisci i dati come JSON
        return response()->json($breweries);
    }
}
