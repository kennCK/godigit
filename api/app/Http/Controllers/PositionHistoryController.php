<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PositionHistory;
use DB;

class PositionHistoryController extends APIController
{
    function __construct(){
    $this->model = new PositionHistory();
  }
}
