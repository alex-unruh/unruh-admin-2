<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	protected $guarded = [];

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function gallery()
	{
		return $this->belongsTo('App\Models\Gallery');
	}
}
