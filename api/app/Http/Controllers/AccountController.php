<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use DB;

class AccountController extends APIController
{
     function __construct(){
        $this->model = new Account();
        $this->validation = array(  
          "email" => "unique: accounts",
          "username"  => "unique: accounts"
        );
    }
}
