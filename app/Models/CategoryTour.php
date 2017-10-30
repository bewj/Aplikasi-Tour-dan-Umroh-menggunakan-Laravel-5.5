<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTour extends Model
{
    protected $table = "categories_tour";

    public $timestamps = false;

    protected $fillable = [
      'name_tour', 'description'
    ];
}
