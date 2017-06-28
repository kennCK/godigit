<?php


namespace App\Http\Controllers;

use App\AccountType;
use Illuminate\Http\Request;
use DB;

class AccountTypeController extends APIController
{
     function __construct(){
        $this->model = new AccountType();
    }
}
