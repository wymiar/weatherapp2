<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\WeatherService;

class PostController extends Controller
{
    public function index()

    {
        $weatherService = new WeatherService();
        $weather = $weatherService->getCurrentWeather('Parczew');
        return view('dashboard', compact('weather'));
    }
}