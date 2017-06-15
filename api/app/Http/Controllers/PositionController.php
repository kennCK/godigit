<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use DB;

class PositionController extends APIController
{
  function __construct(){
    $this->model = new Position();
  }
}
