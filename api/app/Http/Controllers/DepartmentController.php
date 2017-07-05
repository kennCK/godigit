<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends APIController
{

  function __construct(){
    $this->model = new Department();

    $this->validation = array(
      "email" => "unique:departments"
    );
    $this->notRequired = array(
      "fax_number",
      "logo"
    );
    $this->singleFileUpload = array(
      array(
        "name" => 'logo',
        "path" => 'images/department',
        "column" => 'logo'
      )
    );
  }

  public function  department_members(){
    return $this->hasMany('App\DepartmentMember');
  }
}
