<?php

namespace App\Actions\FourSquare;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GetVenue
{
    public function execute(string $city = 'kyoto', string $country = 'jp')
    {
        $url = config('four_square.api_url');
        $clientId = config('four_square.client_id');
        $clientSecret = config('four_square.client_secret');
        $oauth_token = config('four_square.oauth_token');
        $radius = config('four_square.features.radius');
        $limit = config('four_square.features.limit');

        $query = $url.'client_id='.$clientId.'&client_secret='.$clientSecret.'&oauth_token='.$oauth_token.'&near='.$city.','.$country.'&radius='.$radius.'&limit='.$limit;
return [$query];
        return Http::get($query);
    }
}
