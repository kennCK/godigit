<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentMember extends APIModel
{

  public function  department(){
    return $this->belongsTo('App\Department');
  }
}
