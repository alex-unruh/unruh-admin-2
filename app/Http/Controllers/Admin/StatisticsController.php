<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statistic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * Undocumented class
 *
 * @author Alexandre Unruh <alexandre@unruh.com.br>
 */
class StatisticsController extends Controller
{

    /**
     * Get visit statistics today
     *
     * @return Illuminate\Http\Response;
     */
    public function visitsToday()
    {
        $min_config = config('admin.min_hours_to_display');
        $time = date('H');
        $min_hours = $time > $min_config ? $time : $min_config;
        $hours = [];
        for ($i = 0; $i <= $min_hours; $i++) {
            $hours[$i] = 0;
        }

        $data = Statistic::select('hour', DB::raw('COUNT(id) as visits'))
            ->whereDate('created_at', date('Y-m-d'))
            ->groupBy('hour')
            ->orderBy('visits', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $res) {
            $hours[$res['hour']] = $res['visits'];
        }

        return $hours;
    }

    /**
     * Get visit statistics for the current month
     *
     * @return Illuminate\Http\Response;
     */
    public function visitsInMonth()
    {
        $min_config = config('admin.min_days_to_display');
        $time = date('d');
        $min_days = $time > $min_config ? $time : $min_config;
        $days = [];
        for ($i = 1; $i < $min_days; $i++) {
            $days[$i] = 0;
        }

        $data = Statistic::select('day', DB::raw('COUNT(id) as visits'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->groupBy('day')
            ->orderBy('visits', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $res) {
            $days[$res['day']] = $res['visits'];
        }

        return $days;
    }

    /**
     * Get visit statistics for the current year
     *
     * @return Illuminate\Http\Response;
     */
    public function visitsInYear()
    {
        $min_config = config('admin.min_months_to_display');
        $labels = config('admin.months');
        $months = [];
        for ($i = 1; $i <= $min_config; $i++) {
            $months[$labels[$i]] = 0;
        }

        $data = Statistic::select('month', DB::raw('COUNT(id) as visits'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('visits', 'desc')
            ->get()
            ->toArray();

        foreach ($data as $res) {
            $months[$res['month']] = $res['visits'];
        }

        return $months;
    }

    /**
     * Get statistics of a specific data on a specific period
     *
     * @param [type] $column
     * @param [type] $date
     * @return Illuminate\Http\Response;
     */
    public function columnStats($column, $date = 'day', $limit = -1)
    {
        $response = [];
        $data = Statistic::select($column, DB::raw('COUNT(id) as visits'));

        if ($date == 'year') {
            $data->whereYear('created_at', date('Y'));
        } elseif ($date == 'month') {
            $data->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
        } else {
            $data->whereDate('created_at', date('Y-m-d'));
        }

        $data->groupBy($column)
            ->limit($limit)
            ->orderBy('visits', 'desc');

        foreach ($data->get()->toArray() as $res) {
            $response[$res[$column]] = $res['visits'];
        }

        return $response;
    }
}
