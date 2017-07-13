<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInformation extends APIModel
{
  public function  account_type(){
    return $this->belongsTo('App\AccountType','id');
  }

  public function account(){
    return $this->belongsTo('App\Account','id');
  }

  public function company_branch_employee(){
    return $this->hasMany('App\CompanyBranchEmployee');
  }
}
