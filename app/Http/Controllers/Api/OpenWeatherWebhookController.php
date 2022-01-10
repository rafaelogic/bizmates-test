<?php

namespace App\Http\Controllers\Api;

use App\Actions\OpenWeather\GetCityOpenWeather;
use App\Models\City;
use Illuminate\Http\Request;

class OpenWeatherWebhookController extends ApiController
{
    public function getWeather(Request $request, $city)
    {
        $city = City::findOrFail($city);

        if (isset($city->id)) {
            return $this->successResponse(
                app(GetCityOpenWeather::class)->execute($city->name),
                'Successfully get city weather'
            );
        }

        return $this->errorResponse('City not found.', 204);
    }
}
