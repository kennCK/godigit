<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranchEmployee extends APIModel
{
  public function company_branches(){
    return $this->belongsTo('App\CompanyBranch', 'id');
  }
  public function account_informations(){
    return $this->belongsTo('App\AccountInformation', 'id');
  }
}