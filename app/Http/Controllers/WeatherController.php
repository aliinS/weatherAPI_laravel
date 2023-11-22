<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {   
        $apiKey = env('API_KEY');
        $city = $request->input(
            'city', 'Tallinn'); // Default to Tallinn if city is not provided
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

        $response = Http::get($url);

        $weatherData = $response->json();

        return view('weather', ['weatherData' => $weatherData, 'city' => $city]);
    }
}
