<?php

namespace App\Services;

class WeatherService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.openweathermap.org/data/2.5/';

    public function __construct()
    {
        $this->apiKey = config('services.weather.api_key');
    }

    public function getCurrentWeather($city)
    {
        $url = $this->baseUrl . 'weather?q=' . urlencode($city) . '&appid=' . $this->apiKey;
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return [
            'location' => $data['name'],
            'temperature' => round($data['main']['temp'] - 273.15, 2), // Convert from Kelvin to Celsius
            'condition' => $data['weather'][0]['description'],
        ];
    }
}