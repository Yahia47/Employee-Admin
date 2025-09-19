<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    // Fetch all from external API
    public function fetchAll()
    {
        $response = Http::get('https://restcountries.com/v3.1/all?fields=area,capital,currencies,languages,name');

        $countries = collect($response->json())->map(fn($c) => [
            'name' => $c['name']['common'] ?? '',
            'capital' => $c['capital'][0] ?? null,
            'area' => $c['area'] ?? null,
            'currencies' => $c['currencies'] ?? null,
            'languages' => $c['languages'] ?? null,
        ]);
        return response()->json($countries);
    }

    // Search by name
    public function search($name)
    {
        $response = Http::get("https://restcountries.com/v3.1/name/{$name}?fields=area,capital,currencies,languages,name");
        $countries = collect($response->json())->map(fn($c) => [
            'name' => $c['name']['common'] ?? '',
            'capital' => $c['capital'][0] ?? null,
            'area' => $c['area'] ?? null,
            'currencies' => $c['currencies'] ?? null,
            'languages' => $c['languages'] ?? null,
        ]);
        return response()->json($countries);
    }

    // Store in DB
    public function store(Request $request)
    {
        $country = Country::create([
            'name' => $request->name,
            'capital' => $request->capital,
            'area' => $request->area,
            'currencies' => $request->currencies,
            'languages' => $request->languages,
        ]);
        return response()->json($country);
    }

    // Get added countries from DB
    public function added()
    {
        return response()->json(Country::all());
    }


    public function storeFromApi(Request $request)
    {
        $response = Http::get("https://restcountries.com/v3.1/name/{$request->name}?fields=area,capital,currencies,languages,name");

        $data = $response->json()[0] ?? null;

        if (!$data) {
            return response()->json(['error' => 'Country not found'], 404);
        }

        $country = Country::create([
            'name' => $data['name']['common'],
            'capital' => $data['capital'][0] ?? null,
            'area' => $data['area'] ?? null,
            'currencies' => $data['currencies'] ?? [],
            'languages' => $data['languages'] ?? [],
        ]);

        return response()->json($country);
    }
}
