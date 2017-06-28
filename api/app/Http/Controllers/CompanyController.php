<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends APIController
{
  function __construct(){
    $this->model = new Company();
    $this->validation = array(
    /*  "company_branches.name"   => "required",
      "company_branches.code"   => "required", 
      "company_branches.contact_number" => "required",
      "company_branches.fax_number" => "required",
      "email"  => "unique: company_branches",*/
      //"company_logo.directory"  => "required" 
    );

    $this->notRequired = array(
      "vision",
      "mission",
      "core_values",
      "social_responsibilities",
    );
    
    $this->editableForeignTable = array(
      // "company_branches",
      //"company_logo"
    );
  }
}
