<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {   
        $apiKey = env('WEATHER_API_KEY');
        $city = $request->input(
            'city', 'Tallinn'); // this is the default city ATM
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

        $response = Http::get($url);

        // Check if the response is successful and contains weather data
        if ($response->successful() && isset($response['cod']) && $response['cod'] === 200){
            $weatherData = $response->json(); 
            return view('weather', ['weatherData' => $weatherData, 'city' => $city]);
        } else {
            // If response does not contain weather data, return error view
            return view('weather', ['city' => $city]);
        }
    }
}
