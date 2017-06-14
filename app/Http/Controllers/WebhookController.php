<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function endpoint(Request $request)
    {
        Log::info($request->getContent());
    }
}
