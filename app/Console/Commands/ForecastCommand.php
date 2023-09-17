<?php

namespace App\Console\Commands;

use App\Services\ForecastService;
use App\Services\LogService;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ForecastCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:forecast-command {cityId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var \App\Services\LogService
     */
    public $logService;

    /**
     * @var \App\Services\ForecastService
     */
    public $forecastService;

    /**
     * @var \App\Models\Log
     */
    private $log;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /** @var integer */
    private $cityId;

    /**
     * @param \App\Services\LogService $logService
     * @param \App\Services\ForecastService $forecastService
     * @return void
     */
    public function __construct(LogService $logService, ForecastService $forecastService)
    {
        $this->logService = $logService;
        $this->forecastService = $forecastService;
        $this->client = new Client([
            'base_uri' => $forecastService->endpoint,
        ]);
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // '1850147'
            $this->cityId = $this->argument('cityId');
            
            $params = [
                'id' => $this->cityId,
                'appid' => env('OPENWEATHERMAP_API_KEY'),
            ];
            $uri = '/data/2.5/forecast?' . http_build_query($params);
            $this->log = $this->logService->makeRequest($this->forecastService->endpoint . $uri, $params);
            $response = $this->client->request('GET', $uri);
            $response = json_decode($response->getBody()->getContents());
            $this->log->update([
                'response' => $response,
            ]);
            // $this->log = $this->logService->getLatestLog();
            $result = $this->forecastService->makeForecastByLog($this->log);
            Log::channel('forecast')
                ->info('COUNT:' . $result['count']);
            Log::channel('forecast')
                ->info('RESULT:', $result['forecasts']);
        } catch (\Exception $e) {
            Log::channel('forecast')
                ->error(__FUNCTION__);
            Log::channel('forecast')
                ->error('Error: ' . $e->getMessage());
            $this->fetchForecast();
        }
    }
}
