<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInformation extends APIModel
{

  protected $fillable = ['account_type_id'];
  public function  account_type(){
    return $this->belongsTo('App\AccountType');
  }

  public function  account(){
    return $this->belongsTo('App\Account');
  }
}
