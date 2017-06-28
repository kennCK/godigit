<?php

use Illuminate\Database\Seeder;

class AccountInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('account_informations') -> insert(array(
          array(
            "id"          => "1",
            "account_id"  => "1",
            "account_type_id" => "1",
            "first_name"  => "Kennette",
            "middle_name" => "Jumao-as",
            "last_name"   => "Canales",
            "contact_number" => "09423873602"
          ),
          array(
            "id"          => "2",
            "account_id"  => "2",
            "account_type_id" => "1",
            "first_name"  => "John",
            "middle_name" => "-",
            "last_name"   => "Plenos",
            "contact_number" => "09123456789"
          ),

        ));
    }
}
