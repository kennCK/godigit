<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends APIController
{
   function __construct(){
    $this->model = new Schedule();

    $this->notRequired = array(
        'position_id'
    );
   }
}
