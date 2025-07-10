<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        $kota = $request->get('city', 'Jakarta');
        $weather = $this->weatherService->getWeatherByCity($kota);

        return view('weather', compact('weather', 'kota'));
    }
}

