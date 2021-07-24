<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function mother()
    {
        return $this->hasOne('App\Models\Category', 'id', 'parent');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Posts');
    }
}
