<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $guarded = [];
    protected $table = 'config';

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getData()
    {
        $data = [];
        $site_configs = self::all();
        foreach($site_configs as $configs){
            $data[$configs->key] = $configs->value;
        }

        return $data;
    }
}
