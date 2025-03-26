<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // ✅ Import Http Facade

class ReviewController extends Controller
{
    public function index()
    {
        // ✅ Define API URL and Authorization Token
        $url = "https://api.aantourism.com/v0/featured/review";
        $token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJpbnRlcm5hbF91c2VyIn0.3YkgyOiAzpUk-KLuCPz5Ux_17j3E1ycBl6nNJTJe7QM";

        // ✅ Fetch API Data
        $response = Http::withHeaders([
            'API-Authorization' => $token,
            'Accept' => 'application/json',
        ])->get($url);

        $data = $response->json();

        // ✅ Check if API returned an error
        if ($data['error'] ?? true) {
            return view('reviews.index')->with('error', $data['messages'][0] ?? 'Unknown error');
        }

        // ✅ Extract review data
        $reviews = $data['data'] ?? [];

        // ✅ Pass data to Blade template
        return view('reviews.index', compact('reviews'));
    }
}
