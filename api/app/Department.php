<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends APIModel
{
    public function company_branches(){
      return $this->belongsTo('App\CompanyBranch', 'id');
    }

    public function department_members(){
      return $this->hasMany('App\DepartmentMember');
    } 
}
