<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function showForm()
    {
        return view('subscription.form'); // Show the subscription form
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email', // Validate email
        ]);

        $url = "https://api.aantourism.com/v0/email/subscribe";
        $token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJpbnRlcm5hbF91c2VyIn0.3YkgyOiAzpUk-KLuCPz5Ux_17j3E1ycBl6nNJTJe7QM"; // Replace with a valid token

        $response = Http::withHeaders([
            'API-Authorization' => $token,
            'Accept' => 'application/json',
        ])->post($url, [
            'email' => $request->email,
        ]);

        $data = $response->json();

        if ($data['error'] ?? true) {
            return back()->with('error', $data['messages'][0] ?? 'Subscription failed');
        }

        return back()->with('success', $data['data'] ?? 'Subscribed Successfully!');
    }
}
