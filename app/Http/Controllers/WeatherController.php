<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    /**
     * @var WeatherService
     */
    protected WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @var string $city
     * 
     * @return Response
     */
    public function show(string $city): Response
    {
        $data = $this->weatherService->show($city);

        if (is_null($data)) {
            return response(
                [
                    'message' => 'City not found',
                    'status' => Response::HTTP_NOT_FOUND
                ], 
                Response::HTTP_NOT_FOUND
            );
        }

        return response($data, Response::HTTP_OK);
    }
}
