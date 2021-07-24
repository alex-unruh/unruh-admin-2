<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function getMonthAttribute($value)
    {
        $months = config('admin.months');
        return $months[$value];
    }
}
