<?php

namespace App\Actions\OpenWeather;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class GetCityOpenWeather
{
    /**
     * @throws RequestException
     */
    public  function execute(string $city, string $country = 'jp'): array
    {
        $url   = config('open_weather.api_url');
        $unit  = config('open_weather.features.unit');
        $limit = config('open_weather.features.limit');
        $appId = config('open_weather.api_key');

        $query = $url.$city.','.$country.','.'&units='.$unit.'&cnt='.$limit.'&appid='.$appId;

        $response = Http::get($query);
        return $this->prepareData($response);
    }

    /**
     * @throws RequestException
     */
    protected function prepareData(\Illuminate\Http\Client\Response $response): array
    {
        if ($response->clientError() || $response->serverError()) {
            $response->throw();
        }

        if ($response->successful()) {
            return app(FormatOpenWeatherApiResponse::class)->execute(json_decode($response, true));
        }

        return array();
    }
}

