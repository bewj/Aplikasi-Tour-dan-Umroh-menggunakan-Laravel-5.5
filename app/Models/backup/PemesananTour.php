<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tour;

class PemesananTour extends Model
{
  use SoftDeletes;

  protected $table = "pemesanan_tours";

  protected $fillable = [
    'name', 'email', 'telp', 'package', 'price', 'date', 'peserta', 'note'
  ];

  protected $dates = ['deleted_at'];

  public function Tour()
  {
    return $this->belongsTo('tours');
  }

}
