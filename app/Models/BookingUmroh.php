<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingUmroh extends Model
{
    use SoftDeletes;

    protected $table = 'booking_umrohs';

    protected $fillable = [
      'code_booking', 'name', 'email', 'telephone', 'package', 'price', 'participant', 'note', 'status'
    ];

    protected $dates = ['deleted_at'];
}
