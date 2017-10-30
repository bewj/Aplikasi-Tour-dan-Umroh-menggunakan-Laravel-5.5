<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Tour extends Model
{
  use SoftDeletes;

  protected $table = 'tours';

  protected $primaryKey = 'tour_id';

  protected $fillable = [
    'title', 'slug', 'author', 'category', 'images', 'status', 'duration', 'start_period', 'end_period', 'price', 'itinerary', 'terms_conditions'
  ];

  protected $dates = ['deleted_at'];

  public function getUser()
  {
    return $this->belongsTo(User::class);
  }

  public function getCategory()
  {
    return $this->belongsTo(CategoryTour::class);
  }
  
  public function Booking()
  {
    return $this->belongsTo(BookingTour::class);
  }
}
