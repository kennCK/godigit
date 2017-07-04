<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends APIModel
{
    protected $hidden = array('password');

    public function account_informations(){
      return $this->hasOne('App\AccountInformation');
    }

    public function account_profile_pictures(){
      return $this->hasOne('App\AccountProfilePicture');
    }

    public function position_histories(){
      return $this->hasMany('App\PositionHistory');
    }

    public function employee_status(){
       return $this->hasOne('App\EmployeeStatus');
    }

    public function account_schedule(){
        return $this->hasOne('App\AccountSchedule');
    }
}