<?php

use Illuminate\Database\Seeder;

class CompanyBranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('company_branches') -> insert(array(
          array(
            "id"          => "1",
            "company_id"  => "1",
            "name"        => "GoCentral",
            "code"        => "GC",
            "email"       => "gocentral@gmail.com",
            "address"     => "Cebu City, Philippines",
            "contact_number" => "09123456789",
            "fax_number"  => "123"
          ),
        ));
    }
}
