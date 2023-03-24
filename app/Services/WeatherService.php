<?php

namespace App\Services;

use App\Models\Weather;
use App\Repositories\WeatherRepository;

class WeatherService
{
    /**
     * @var WeatherRepository
     */
    protected WeatherRepository $weatherRepository;

    public function __construct(WeatherRepository $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function createOrUpdateWeather(): bool
    {
        $cities = [
            'Auckland',
            'Sydney',
            'Christchurch',
            'Manila',
            'Hamilton'
        ];

        foreach ($cities as $city) {
            if (!$this->weatherRepository->createOrUpdateWeather($city)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @var string $city
     * 
     * @return Weather|null
     */
    public function show(string $city): ?Weather
    {
        return $this->weatherRepository->show($city);
    }
}
