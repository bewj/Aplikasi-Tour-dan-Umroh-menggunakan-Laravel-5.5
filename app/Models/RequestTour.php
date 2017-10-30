<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestTour extends Model
{
  use SoftDeletes;

  protected $table = "request_tours";

  protected $fillable = [
    'code_booking', 'name', 'email', 'telephone', 'location', 'duration', 'note', 'status'
  ];

  protected $dates = ['deleted_at'];
}
