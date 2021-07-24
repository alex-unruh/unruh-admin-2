<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  private $status = [1 => 'Ativo', 2 => 'Inativo'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ['password'];

  /**
   * Undocumented function
   *
   * @return void
   */
  public function posts()
  {
    return $this->hasMany('App\Models\Post');
  }

  /**
   * Se a senha vier "null" não altera, caso contrário faz o hash e armazena na base
   *
   * @param string $value
   * @return void
   */
  public function setPasswordAttribute($value)
  {
    if (!$value) {
      return;
    }
    $this->attributes['password'] = Hash::make($value);
  }

  /**
   * Undocumented function
   *
   * @param [type] $value
   * @return void
   */
  public function setProfileAttribute($value)
  {
    $this->attributes['profile'] = array_search($value, config('admin.user_profiles'));
  }

  /**
   * Undocumented function
   *
   * @param [type] $value
   * @return void
   */
  public function getProfileAttribute($value)
  {
    $profiles = config('admin.user_profiles');
    return $profiles[$value];
  }

  /**
   * Undocumented function
   *
   * @param [type] $value
   * @return void
   */
  public function setStatusAttribute($value)
  {
    $this->attributes['status'] = array_search($value, $this->status);
  }

  /**
   * Undocumented function
   *
   * @param [type] $value
   * @return void
   */
  public function getStatusAttribute($value)
  {
    return $this->status[$value];
  }
}
