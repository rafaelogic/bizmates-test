<?php

/**
 * Open Weather API
 * 5 day forecast is available at any location or city. It includes weather forecast data with 3-hour step. Forecast is available in JSON or XML format.
 * query = api.openweathermap.org/data/2.5/forecast?q={city name},{state code},{country code}&units=metric&limit=5&appid={API key}
 */

return [
    'api_key' => env('OPEN_WEATHER_APP_KEY', null),
    'api_url' => 'api.openweathermap.org/data/2.5/forecast?q=',
    'features' => [
        'limit' => 5,
        'unit' => 'metric'
    ]
];
