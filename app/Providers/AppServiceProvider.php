<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\CliDumper;
use Illuminate\Foundation\Http\HtmlDumper;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        HtmlDumper::dontIncludeSource();
        CliDumper::dontIncludeSource();

        Model::shouldBeStrict();
        Model::unguard();
        Date::use(CarbonImmutable::class);
    }

    public function boot()
    {
        //
    }
}
