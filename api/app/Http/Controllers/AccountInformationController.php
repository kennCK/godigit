<?php

namespace App\Http\Controllers;

use App\AccountInformation;
use Illuminate\Http\Request;
use DB;

class AccountInformationController extends APIController
{
     function __construct(){  
        $this->model = new AccountInformation();

        $this->validation = array(
          'account_id'  => "unique:acount_informations"
        );
    }
}
