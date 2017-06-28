<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends APIController
{
     function __construct(){  
        $this->model = new Account();
        $this->validation = array(  
          "email" => "unique:accounts",
          "username"  => "unique:accounts",
          "account_informations.*account_id" => "required",
          "account_informations.account_type_id"  => "required"
        );
        
        $this->editableForeignTable = array(
          "account_informations"
        );
    }
}
