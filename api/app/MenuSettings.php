<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuSettings extends APIModel
{
  //use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'menu_settings';
  /*protected $fillable = array(
      'parent_id',
      'module',
      'title',
      'left_icon',
      'right_icon',
      'method',
      'rank'
  );
  public $timestamps = true;
  protected $dates = ['deleted_at'];
  public function menu()
  {
    return $this->belongsTo('\App\MenuSettings');
  }*/
}
