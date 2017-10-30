<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUmroh extends Model
{
    protected $table = "categories_umroh";

    public $timestamps = false;

    protected $fillable = [
      'name_umroh', 'description'
    ];
}
