<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Services\BreweryService;
use Illuminate\Pagination\LengthAwarePaginator; // Importa la classe LengthAwarePaginator
use Illuminate\Support\Collection; 


use Illuminate\Http\Request;

class BreweryController extends Controller
{
    protected $breweryService;

    public function __construct(BreweryService $breweryService)
    {
        $this->breweryService = $breweryService;
    }

    public function index()
    {
        $json = file_get_contents(public_path('breweries.json'));

        // Decodifica il JSON in un array PHP
        $breweries = json_decode($json, true);

        // Passa i dati alla vista
        return view('breweries.index', ['breweries' => $breweries]);
    }

    public function show($id)
    {
        $json = file_get_contents(public_path('breweries.json'));

        $breweries = json_decode($json, true);

        $brewery = array_filter($breweries, function($brewery) use ($id) {
            return $brewery['id'] == $id;
        });

        $brewery = !empty($brewery) ? array_shift($brewery) : null;

        if ($brewery) {
            return view('breweries.show', ['brewery' => $brewery]);
        } else {
            return response()->json(['message' => 'Birrificio non trovato.'], 404);
        }
    }
}