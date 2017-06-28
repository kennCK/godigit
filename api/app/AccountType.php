<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountType extends APIModel
{
  use SoftDeletes;
  protected  $primaryKey= 'id';
  protected  $table = 'account_types';

}
