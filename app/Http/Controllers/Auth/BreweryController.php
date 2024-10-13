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

    public function index(Request $request)
    {
    // Recupera le birrerie dal service
    $breweries = $this->breweryService->getBreweries();

    // Converte i risultati in una Collection
    $breweriesCollection = collect($breweries);

    // Numero di elementi per pagina
    $perPage = 9;

    // Recupera la pagina corrente (di default è la pagina 1)
    $currentPage = LengthAwarePaginator::resolveCurrentPage();

    // Segmenta la Collection in base alla pagina corrente
    $currentPageItems = $breweriesCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

    // Crea un oggetto LengthAwarePaginator
    $paginatedItems = new LengthAwarePaginator(
        $currentPageItems, // Gli elementi per la pagina corrente
        $breweriesCollection->count(), // Il numero totale di elementi nella Collection
        $perPage, // Il numero di elementi per pagina
        $currentPage, // La pagina corrente
        ['path' => $request->url(), 'query' => $request->query()] // Per mantenere l'URL e i parametri query
    );

    // Passa i dati alla vista
    return view('breweries.index', ['breweriesCollection' => $paginatedItems]);
    }
}