<?php

namespace Tests\Unit\Actions\OpenWeather;

use App\Actions\OpenWeather\GetCityOpenWeather;
use Tests\TestCase;
use function app;
use function dump;

class GetCityOpenWeatherTest extends TestCase
{
    /**
     * @covers \App\Actions\OpenWeather\GetCityOpenWeather
     * @covers \App\Actions\OpenWeather\FormatOpenWeatherApiResponse
     */
    public function test_can_connect_to_open_weather_api_and_fetch_city_weather_data(): void
    {
        $response = app(GetCityOpenWeather::class)->execute('tokyo', 'jp');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('temp', $response[0]);
    }

    /**
     * @covers \App\Actions\OpenWeather\GetCityOpenWeather
     * @covers \App\Actions\OpenWeather\FormatOpenWeatherApiResponse
     */
    public function test_city_is_required_get_weather(): void
    {
        $response = app(GetCityOpenWeather::class)->execute(null, 'jp');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('temp', $response[0]);
    }
}
