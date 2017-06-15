<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentMembers;
use DB;

class DepartmentMembersController extends APIController
{
  //
  function __construct(){
    $this->model = new DepartmentMembers();
  }
}
