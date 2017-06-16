<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules;
use DB;

class ModulesController extends APIController
{
  function __construct(){
    $this->model = new Modules();
  }
}
