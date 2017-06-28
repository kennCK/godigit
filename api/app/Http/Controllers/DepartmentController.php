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
    $this->defaultValue = array(
      "company_id" => 0
    );
  }
  public function create(Request $request){
    $this->createEntry($request->all());
    $this->response['debug'][] = $this->singleImageFileUpload($this->response['data'], $request, 'logo', 'department_logo', 'logo');
    return $this->response;
  }
}
