<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Property extends Model
{
    protected $guarded = [];
    protected $table = 'properties';
    private $purposes = ['Venda' => 1, 'Locação' => 2];

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
     * @return void
     */
    public function details()
    {
        return $this->hasMany('App\Models\Detail');
    }

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
    public function setPurposeAttribute($value)
    {
        $this->attributes['purpose'] = $this->purposes[$value];
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function setTypeAttribute($value)
    {
        $types = config('admin.property_types');
        $this->attributes['type'] = array_search($value, $types);
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function getPurposeAttribute($value)
    {
        return array_search($value, $this->purposes);
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function getTypeAttribute($type)
    {
        $types = config('admin.property_types');
        return $types[$type];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = preg_replace('/\D/', '', $value);
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
