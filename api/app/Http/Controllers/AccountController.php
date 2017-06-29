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
          "username"  => "unique:accounts"
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
