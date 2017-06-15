<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use DB;

class DepartmentController extends APIController
{

  //
  function __construct(){
    $this->model = new Department();
  } 
}
