<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.openweathermap.org/data/2.5/weather';

    public function __construct()
    {
        $this->apiKey = config('services.openweather.api_key');
    }

    public function getWeatherByCity(string $kota)
    {
        $response = Http::get($this->baseUrl, [
            'q' => $kota,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
