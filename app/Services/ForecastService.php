<?php

namespace App\Services;

use App\Repositories\ForecastRepository;
use App\Repositories\WeatherRepository;
use Illuminate\Support\Facades\DB;

class ForecastService
{
    /** @var \App\Repositories\ForecastRepository */
    protected $repository;

    /** @var \App\Repositories\WeatherRepository */
    protected $weatherRepository;

    /** @var string */
    public $endpoint = 'https://api.openweathermap.org';

    /**
     * @param \App\Repositories\ForecastRepository $repository
     * @param \App\Repositories\WeatherRepository $weatherRepository
     * @return void
     */
    public function __construct(ForecastRepository $repository, WeatherRepository $weatherRepository)
    {
        $this->repository = $repository;
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @param array $params
     * @return \App\Models\Forecast
     */
    public function makeForecast($params)
    {
        $response = DB::transaction(function () use ($params) {
            $main = $params['main'];
            $wind = $params['wind'];
            $weather = $params['weather'][0];

            return $this->repository->firstOrCreate([
                'date_time' => $params['dt_txt'],
            ], [
                'weather_id' => $this->weatherRepository->firstOrCreate([
                    'code' => $weather['id'],
                ], [
                    'name' => $weather['main'],
                    'description' => $weather['description'],
                    'icon_path' => 'https://openweathermap.org/img/wn/' . $weather['main'] . '@2x.png',
                ])->id,
                'temp' => $main['temp'],
                'temp_feels' => $main['feels_like'],
                'temp_min' => $main['temp_min'],
                'temp_max' => $main['temp_max'],
                'pressure' => $main['pressure'],
                'sea_lvl' => $main['sea_level'],
                'grnd_lvl' => $main['grnd_level'],
                'humidity' => $main['humidity'],
                'temp_kf' => $main['temp_kf'],
                'clouds' => $params['clouds']['all'] ?? 0,
                'wind_speed' => $wind['speed'],
                'wind_deg' => $wind['deg'],
                'wind_gust' => $wind['gust'],
                'visibility' => $params['visibility'],
                'pop' => $params['pop'],
                'rain_3h' => $params['rain']['3h'] ?? null,
                'sys_pod' => $params['sys']['pod'],
            ]);
        }, 3);

        return $response;
    }

    /**
     * @param $log \App\Models\Log
     * @return \App\Models\Forecast
     */
    public function makeForecastByLog($log)
    {
        $forecasts = [];

        foreach ($log->response['list'] as $forecast) {
            $forecasts[] = $this->makeForecast($forecast)->toArray();
        }

        return [
            'count' => count($forecast),
            'forecasts' => $forecasts,
        ];
    }
}
