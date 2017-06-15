<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionHistory extends APIModel
{
  use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'position_history';
}
