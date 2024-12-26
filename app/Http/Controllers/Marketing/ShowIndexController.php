<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Hybridly\Contracts\HybridResponse;

final class ShowIndexController extends Controller
{
    public function __invoke(): HybridResponse
    {
        return hybridly('marketing.index');
    }
}
