<?php

/**
 * Search for places in the FSQ Places database using a location and querying by name, category name,
 * taste label, or chain name. For example, search for "coffee" to get back a list of recommended coffee shops.
 *
 * https://api.foursquare.com/v2/venues/search?near=Osaka,JP&limit=5&categoryId=
 */

return [
    'api_url' => 'https://api.foursquare.com/v2/venues/search?',
    'client_id' => env('FOUR_SQUARE_CLIENT_ID', null),
    'client_secret' => env('FOUR_SQUARE_CLIENT_SECRET', null),
    'oauth_token' => env('FOUR_SQUARE_APP_KEY', null),
    'features' => [
        'limit' => 5,
        'radius' => 500,
    ]
];
