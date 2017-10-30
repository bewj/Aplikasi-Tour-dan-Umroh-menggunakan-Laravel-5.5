<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDatas extends Model
{
    protected $table = 'personal_datas';

    public $timestamps = false;

    protected $fillable = [
      'name', 'place_of_birth', 'date_of_birth', 'sex', 'religion', 'status_marriage', 'citizen', 'address'
    ];
}
