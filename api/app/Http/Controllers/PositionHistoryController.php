<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PositionHistory;

class PositionHistoryController extends APIController
{
    function __construct(){
    $this->model = new PositionHistory();
  }
}
