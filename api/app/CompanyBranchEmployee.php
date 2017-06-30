<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranchEmployee extends APIModel
{
 
  public function  company_branch(){
    return $this->belongsTo('App\CompanyBranch');
  }
}