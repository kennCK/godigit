<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends APIModel
{
  use SoftDeletes;
  protected  $primaryKey = 'id';
  protected  $table = 'accounts';
}