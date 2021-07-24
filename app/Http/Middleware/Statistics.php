<?php

namespace App\Http\Middleware;

use App\Models\Statistic;
use Illuminate\Support\Facades\Auth;
use Propa\BrowscapPHP\Facades\Browscap;

class Statistics
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }

    /**
     * Saves visitor data as location and browser
     *
     * @return void
     */
    public function terminate($request, $response)
    {
        if(Auth::check() && !config('admin.register_authenticated')){
            return;
        }
        $geo = json_decode(file_get_contents("http://ip-api.com/json/{$request->ip}"));
        $browser = Browscap::getBrowser();
        $stats = new Statistic();
        $stats->ip = $request->ip ?? $geo->query;
        $stats->lat = $geo->lat;
        $stats->lon = $geo->lon;
        $stats->country = $geo->country;
        $stats->region = $geo->regionName;
        $stats->city = $geo->city;
        $stats->isp = $geo->isp;
        $stats->browser = $browser->browser;
        $stats->version = $browser->version;
        $stats->device = $browser->device_type;
        $stats->platform = $browser->platform;
        $stats->year = date('Y');
        $stats->month = date('m');
        $stats->day = date('d');
        $stats->hour = date('H');
        $stats->uri = $_SERVER['REQUEST_URI'];
        $stats->referer = $_SERVER['HTTP_REFERER'] ?? 'Direct Access';
        $stats->save();
    }
}
