<?php

namespace Mr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mr\Http\Controllers\Controller;
class WebhookController extends Controller
{
    public function endpoint(Request $request)
    {
        Log::info($request->getContent());
    }
}
