<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends APIModel
{
  use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'companies';

  public function businessType(){
    return $this->belongsTo('App\businessType');
  }

  public function logo(){
    return $this->hasOne('App\CompanyLogo');
  }

  public function branches(){
    return $this->hasMany('App\CompanyBranch');
  }
}