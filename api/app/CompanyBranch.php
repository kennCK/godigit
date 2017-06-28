<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranch extends APIModel
{

  protected $fillable = ['name','code','address','contact_number','fax_number','email'];
  public function  company(){
    return $this->belongsTo('App\Company');
  } 

  public function  company_employees(){
    return $this->hasMany('App\CompanyEmployee');
  }
}
