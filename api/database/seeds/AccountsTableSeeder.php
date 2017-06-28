<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('accounts') -> insert(array(
          array("id" => "1","username" => "Admin", "email" => "Admin@gocentralph.com", "password" => "gocentral2017"), 
          array("id" => "2","username" => "Employee", "email" => "Employee@gocentralph.com", "password" => "gocentral2017"),
        ));
    }
}
