<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranch extends APIModel
{
    //
  use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'company_branches';
 
  public function  company(){
    return $this->belongsTo('App\Company');
  } 

  public function  employees(){
    return $this->hasMany('App\CompanyEmployees');
  }
}
