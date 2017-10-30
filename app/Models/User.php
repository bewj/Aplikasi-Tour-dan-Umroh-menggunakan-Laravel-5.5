<?php

namespace App\Models;

use Eloquent;
use App\Models\User;
use App\Models\Role;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements Authenticatable, CanResetPasswordContract
{
  use Notifiable;
  use CanResetPassword;
  use AuthenticableTrait;
  use SoftDeletes { restore as private restoreB; }
  use EntrustUserTrait { restore as private restoreA; }

  public function restore()
  {
    $this->restoreA();
    $this->restoreB();
  }
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $table = 'users';

  protected $fillable = [
      'name', 'email', 'password', 'verifyToken', 'status'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  protected $dates = ['deleted_at'];

  public function role()
  {
    return $this->belongsToMany(Role::class);
  }

  public function article()
  {
    return $this->belongsTo(Article::class);
  }

  public function tour()
  {
    return $this->belongsTo(Tour::class);
  }

  public function umroh()
  {
    return $this->belongsTo(Umroh::class);
  }

  public function profile()
  {
    return $this->belongsTo(PersonalDatas::class);
  }

  public function education()
  {
    return $this->belongsToMany(Education::class);
  }
}
