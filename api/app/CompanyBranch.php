<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranch extends APIModel
{

  protected $fillable = ['name','code','address','contact_number','fax_number','email'];
  public function  company(){
    return $this->belongsTo('App\Company', 'id');
  } 

  public function company_branch_employee(){
    return $this->hasMany('App\CompanyBranchEmployee');
  }

  public function positions(){
    return $this->hasMany('App\Position');
  }

  public function schedules(){
    return $this->hasMany('App\Schedule');
  }
}
