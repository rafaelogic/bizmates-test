<?php

namespace App\Http\Controllers\Api;

use App\Actions\FourSquare\GetVenue;


class FourSquareWebhookController extends ApiController
{
    public function getVenues()
    {
        return response()->json(app(GetVenue::class)->execute());
    }
}
