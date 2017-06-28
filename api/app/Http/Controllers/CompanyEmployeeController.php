<?php

namespace App\Http\Controllers;

use App\CompanyEmployee;
use Illuminate\Http\Request;

class CompanyEmployeeController extends APIController
{
    function __construct(){
        $this->model = new CompanyEmployee();
    }
}
