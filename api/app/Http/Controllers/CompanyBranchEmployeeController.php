<?php

namespace App\Http\Controllers;

use App\CompanyBranchEmployee;
use Illuminate\Http\Request;

class CompanyBranchEmployeeController extends APIController
{
    function __construct(){
        $this->model = new CompanyBranchEmployee();
    }
}
