<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionHistory extends APIModel
{
  protected $table = 'position_history';
  public function position(){
    return $this->belongsTo('App\Position');
  }

  public function account(){
    return $this->belongsTo('App\Account');
  }
  
}
