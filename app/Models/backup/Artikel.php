<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use SoftDeletes;

    protected $table = "artikels";

    protected $fillable = [
      'judul', 'slug', 'author', 'status', 'images', 'deskripsi'
    ];

    protected $dates = ['deleted_at'];
}
