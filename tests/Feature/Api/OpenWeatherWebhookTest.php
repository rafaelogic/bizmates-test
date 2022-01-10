<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Tests\TestCase;

class OpenWeatherWebhookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedCity();
    }

    /**
     * @covers \App\Http\Controllers\Api\OpenWeatherWebhookController
     * @covers \App\Actions\OpenWeather\GetCityOpenWeather
     * @covers \App\Actions\OpenWeather\FormatOpenWeatherApiResponse
     *
     * @return void
     */
    public function test_api_success()
    {
        $this->getJson(route('api.weather', ['city' => 1]))
            ->assertOk()
            ->assertSee(['status' => 'Success']);
    }

    /**
     * @covers \App\Http\Controllers\Api\OpenWeatherWebhookController
     * @covers \App\Actions\OpenWeather\GetCityOpenWeather
     * @covers \App\Actions\OpenWeather\FormatOpenWeatherApiResponse
     *
     * @return void
     */
    public function test_api_fails_when_no_city_provided()
    {
        $this->expectExceptionMessage('Missing required parameter for [Route: api.weather] [URI: api/weather/{city}] [Missing parameter: city].');
        $this->getJson(route('api.weather'));


    }
}
