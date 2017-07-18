<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranchEmployee extends APIModel
{
  public function company_branch(){
    return $this->belongsTo('App\CompanyBranch', 'id');
  }
  public function account(){
    return $this->belongsTo('App\account', 'id');
  }
}