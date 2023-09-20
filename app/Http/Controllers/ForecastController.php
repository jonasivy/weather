<?php

namespace App\Http\Controllers;

use App\Http\Resources\Forecast\IndexResource;
use App\Models\Forecast;
use App\Services\ForecastService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ForecastController extends Controller
{
    /** @var \App\Services\ForecastService */
    protected $forecastService;

    /**
     * @param \App\Services\ForecastService
     * @return void
     */
    public function __construct(ForecastService $forecastService)
    {
        $this->forecastService = $forecastService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $forecast = QueryBuilder::for(Forecast::class)
                ->remember(config('cache.retention'))
                ->allowedFilters([
                    AllowedFilter::scope('country'),
                    AllowedFilter::scope('city'),
                    AllowedFilter::scope('date_between'),
                    'city.openweather_code'
                ])
                ->with([
                    'weather',
                    'city',
                    'country',
                ])
                ->get();

            return new IndexResource($forecast);
        } catch (\Exception $e) {
            Log::error(__FUNCTION__);
            Log::error($e);

            return response([
                'status' => 500,
                'message' => 'Ooops! Something went wrong!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Forecast $entryPoint
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Forecast $forecast)
    {
        try {
            // TO DO
            return response([
                'message' => 'ok',
            ]);
        } catch (\Exception $e) {
            Log::error(__FUNCTION__);
            Log::error($e);

            return response([
                'status' => 500,
                'message' => 'Ooops! Something went wrong!',
            ]);
        }
    }
}
