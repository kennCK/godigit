<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentMembers extends APIModel
{
  //
  use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'department';
}
