<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends APIModel
{
  public function  company_branch(){
    return $this->belongsTo('App\CompanyBranch');
  }

  public function position_histories(){
    return $this->hasMany('App\PositionHistory');
  }

  public function schedule(){
    return $this->hasOne('App\Schedule');
  }
}
