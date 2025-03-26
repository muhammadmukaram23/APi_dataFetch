<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class BlogController extends Controller
{
    public function index()
{
    $url = "https://api.aantourism.com/v0/featured/blog";
    $token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJpbnRlcm5hbF91c2VyIn0.3YkgyOiAzpUk-KLuCPz5Ux_17j3E1ycBl6nNJTJe7QM";

    $response = Http::withHeaders([
        'API-Authorization' => $token,
        'Accept' => 'application/json',
    ])->get($url);

    $data = $response->json();

    if ($data['error'] ?? true) {
        return view('blogs.index')->with('error', $data['messages'][0] ?? 'Unknown error');
    }

    $blogs = $data['data'] ?? [];
    return view('blogs.index', compact('blogs'));
}

}
