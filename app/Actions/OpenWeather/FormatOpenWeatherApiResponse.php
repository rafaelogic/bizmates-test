<?php

namespace App\Actions\OpenWeather;

class FormatOpenWeatherApiResponse
{
    public function execute(array $response): array
    {
        $formattedResponse = array();

        foreach ($response['list'] as $data) {
            $fields = array();
            $fields['temp'] = $data['main']['temp'] ?? null;

            if (isset($data['weather']) && count($data['weather']) > 0) {
                foreach ($data['weather'] as $weather) {
                    $fields['main'] = $weather['main'];
                    $fields['icon'] = $weather['icon'];
                    $fields['description'] = $weather['description'];
                }
            }

            $formattedResponse[] = $fields;
        }

        return $formattedResponse;
    }
}
