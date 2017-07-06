<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountController extends APIController
{
     function __construct(){  
        $this->model = new Account();
        $this->validation = array(  
          "email" => "unique:accounts",
          "username"  => "unique:accounts",
          "account_informations.*account_id" => "unique:account_informations",
          "account_informations.first_name" => "required",
          "account_informations.last_name" => "required" 
        );
        $this->editableForeignTable = array(
          'account_informations'
        );
        $this->foreignTable = array(
          'account_informations'
        );
    } 

    public function create(Request $request){
     $this->createEntry($this->hashPassword($request));
     return $this->output();
    }

    public function update(Request $request){ 
      $this->updateEntry($this->hashPassword($request));
      return $this->output();
    }

    public function hashPassword(Request $request){
      $data = $request->all();
      $data['password'] = Hash::make($data['password']);
      return $data;
    }
}
