<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Umroh extends Model
{
  use SoftDeletes;

  protected $table = "umrohs";

  protected $primaryKey = "umroh_id";

  protected $fillable = [
    'title', 'slug', 'author', 'category', 'images', 'status', 'duration', 'start_period', 'end_period', 'price', 'itinerary', 'terms_conditions'
  ];

  protected $dates = ['deleted_at'];

  public function getUser()
  {
    return $this->belongsTo(User::class);
  }

  public function booking()
  {
    return $this->belongsTo(BookingUmroh::class);
  }
}
