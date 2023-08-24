<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isNull;

class PokemonController extends Controller
{

    public function fetch(Request $request)
    {
        $query = strtolower($request->input('query'));
        $notFound = false;
        $previousQuery = null;

        try {
            if (!empty($query)) {
                $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$query}");
                $pokemon = $response->json();
                $previousQuery = $query;

                if (isNull($pokemon)) {
                    $notFound = true;
                }
                return view('pokemon', compact('pokemon', 'notFound', 'previousQuery'));
            }
        } catch (\Throwable $th) {
            $error = $th;
            return view('pokemon', compact('error'));
        }

        return view('pokemon');

    }

}
