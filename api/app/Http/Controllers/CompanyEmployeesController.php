<?php

namespace App\Http\Controllers;

use App\CompanyEmployees;
use Illuminate\Http\Request;

class CompanyEmployeesController extends APIController
{
    function __construct(){
        $this->model = new CompanyEmployees();
    }
}
