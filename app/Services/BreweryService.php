<?php 

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class BreweryService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getBreweries()
    {
        return Cache::remember('breweries', 60, function () {
            $response = $this->client->get('https://api.openbrewerydb.org/v1/breweries');

            // Decodifica e restituisce la risposta JSON
            return json_decode($response->getBody(), true);
        });
    }
}
