<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Umroh;

class PemesananUmroh extends Model
{
  use SoftDeletes;

  protected $table = "pemesanan_umrohs";

  protected $fillable = [
    'name', 'email', 'telp', 'package', 'price', 'date', 'peserta', 'note'
  ];

  protected $dates = ['deleted_at'];

  public function Umroh()
  {
    return $this->belongsTo('umrohs');
  }
}
