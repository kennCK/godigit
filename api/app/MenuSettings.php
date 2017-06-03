<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuSettings extends Model
{
  use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'menu_settings';
  protected $fillable = array(
      'module',
      'title',
      'icon',
      'method',
      'rank'
  );
  public $timestamps = true;
  protected $dates = ['deleted_at'];
  public function menu()
  {
    return $this->belongsTo('\App\MenuSettings');
  }
}
