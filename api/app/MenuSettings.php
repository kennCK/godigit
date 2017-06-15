<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuSettings extends APIModel
{
  protected $primaryKey = 'id';
  protected $table = 'menu_settings';
}
