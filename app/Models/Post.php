<?php

namespace App\Models;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Post extends Model
{
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallery');
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function getCreatedAtAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function getUpdatedAtAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

    /**
     * Undocumented function
     *
     * @param [type] $category
     * @return void
     */
    public static function getCategory($slug)
    {
        return self::whereHas('categories', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();        
    }
}
