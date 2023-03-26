<?php

namespace App\Repositories;

use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Log;

class WeatherRepository
{
    /**
     * @var Weather $weather
     */
    protected Weather $weather;

    public function __construct(Weather $weather)
    {
        $this->weather = $weather;
    }

    /**
     * @param string $city
     * 
     * @return bool
     */
    public function createOrUpdateWeather(string $city): bool
    {
        $response = Http::get("https://goweather.herokuapp.com/weather/$city");
        Log::info(sprintf('HerokuApp API response: %s', $response));

        if ($response->ok()) {
            $data = json_decode($response->body(), true);
            $this->weather->updateOrCreate(
                [
                    'city' => $city
                ],
                [
                    'city' => $city,
                    'temperature' => $data['temperature'],
                    'wind' => $data['wind'],
                    'description' => $data['description'],
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]
            );
            Log::info(sprintf('Updated weather info for %s', $city));

            return true;
        }

        return false;
    }

    /**
     * @var string $city
     * 
     * @return Weather|null
     */
    public function show(string $city): ?Weather
    {
        return $this->weather
            ->select(
                'city',
                'temperature',
                'wind',
                'description',
                'updated_at as updated'
            )
            ->where('city', ucfirst($city))
            ->first();
    }
}
