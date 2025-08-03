<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function getByCoordinates()
    {
        $response = Http::get('https://api.weatherapi.com/v1/forecast.json', [
            'days' => 7,
            'aqi' => 'no',
            'q' => 'egypt',
            'key' => config('services.openweather.key'),
        ]);

        if (!$response->successful()) {
            return response()->json(
                [
                    'error' => 'Failed to fetch weather data',
                ],
                $response->status(),
            );
        }
        $weather = $response->json();

        $allDays = $weather['forecast']['forecastday'];
        foreach ($allDays as $index => $forecastDay) {
            $allDays[$index]['day_name'] = Carbon::parse($forecastDay['date'])->translatedFormat('l');
        }
        $weather['forecast']['forecastday'] = $allDays;

        // slice days
        $today = $allDays[0];
        $nextDays = array_slice($allDays, 1);

        $weather['today'] = $today;
        $weather['next_days'] = $nextDays;
        // dd($today , $nextDays);

        return view('welcome', compact('weather'));
    }

    public function search(Request $request)
    {
        $city = $request->input('city', 'Cairo');
        $response = Http::get('https://api.weatherapi.com/v1/forecast.json', [
            'key' => config('services.openweather.key'),
            'q' => $city,
            'days' => 7,
            'aqi' => 'no',
            'alerts' => 'no',
        ]);
        $weather = $response->json();

        $allDays = $weather['forecast']['forecastday'];
        foreach ($allDays as $index => $forecastDay) {
            $allDays[$index]['day_name'] = Carbon::parse($forecastDay['date'])->translatedFormat('l');
        }
        
        
        // slice days
        $today = $allDays[0];
        $nextDays = array_slice($allDays, 1);

        $weather['today'] = $today;
        $weather['next_days'] = $nextDays;
        return view('welcome',compact('weather'));
    }
}
