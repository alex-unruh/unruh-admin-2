<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
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
	public function images()
	{
		return $this->hasMany('App\Models\Image');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function post()
	{
		return $this->hasMany('App\Models\Post');
	}
}
