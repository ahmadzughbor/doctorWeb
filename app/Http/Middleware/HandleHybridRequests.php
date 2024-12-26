<?php

namespace App\Http\Middleware;

use App\Data\Hybridly\SharedData;
use Hybridly\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(Request $request): SharedData
    {
        return SharedData::from([
            'security' => [
                'is_authenticated' => auth()->check(),
                'url' => $request->url(),
                'current_route' => Route::currentRouteName(),
            ],
        ]);
    }
}
