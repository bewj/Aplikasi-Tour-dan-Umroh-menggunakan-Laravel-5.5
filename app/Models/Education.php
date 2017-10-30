<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
  protected $table = 'education';

  public $timestamps = false;

  protected $fillable = [
    'name', 'univercity', 'grade', 'ipk', 'graduation'
  ];
}
