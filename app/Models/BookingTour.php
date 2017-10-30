<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTour extends Model
{
  use SoftDeletes;

  protected $table = 'booking_tours';

  protected $fillable = [
    'code_booking', 'name', 'email', 'telephone', 'package', 'price', 'participant', 'departure_date', 'note', 'status'
  ];

  protected $dates = ['deleted_at'];
}
