<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyEmployees extends APIModel
{
  use SoftDeletes;
  protected  = 'id';
  protected  = 'company_employees';

  public function  branch(){
    return $this->belongsTo('App\CompanyBranch');
  }
}