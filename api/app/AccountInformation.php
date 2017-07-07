<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInformation extends APIModel
{

  protected $fillable = ['account_type_id'];
  protected $table = "account_informations";  
  public function  account_type(){
    return $this->belongsTo('App\AccountType','id');
  }

  public function accounts(){
    return $this->belongsTo('App\Account', 'id');
  }

  public function company_branch_employees(){
    return $this->hasMany('App\CompanyBranchEmployee');
  }
}
