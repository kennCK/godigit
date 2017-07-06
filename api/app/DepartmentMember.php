<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentMember extends APIModel
{

  public function  departments(){
    return $this->belongsTo('App\Department', 'id');
  }
}
