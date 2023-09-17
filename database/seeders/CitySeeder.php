<?php

namespace Database\Seeders;

use App\Services\CityService;
use App\Services\CountryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /** @var \App\Services\CountryService */
    private $countryService;

    /** @var \App\Services\CityService */
    private $cityService;

    public function __construct(CountryService $countryService, CityService $cityService)
    {
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->countryService->makeCountry([
            'code' => 'JP',
            'name' => 'Japan',
            'timezone' => 32400,
        ]);

        $cities = json_decode('[{"id":1850147,"name":"Tokyo","state":"","country":"JP","coord":{"lon":139.691711,"lat":35.689499}},{"id":1848354,"name":"Yokohama","state":"","country":"JP","coord":{"lon":139.642502,"lat":35.447781}},{"id":1857910,"name":"Kyoto","state":"","country":"JP","coord":{"lon":135.753845,"lat":35.021069}},{"id":1853908,"name":"Osaka","state":"","country":"JP","coord":{"lon":137.266663,"lat":35.950001}},{"id":2128295,"name":"Sapporo","state":"","country":"JP","coord":{"lon":141.346939,"lat":43.064171}},{"id":1856057,"name":"Nagoya","state":"","country":"JP","coord":{"lon":136.906403,"lat":35.181469}}]');

        foreach ($cities as $city) {
            $this->cityService->makeCity($city);
        }
    }
}
