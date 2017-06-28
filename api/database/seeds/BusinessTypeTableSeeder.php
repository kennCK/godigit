<?php

use Illuminate\Database\Seeder;

class BusinessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('business_type') -> insert(array(
          array("id" => "1","type" => "Call Center", "description" => "This is a Sample"),
        ));
    }
}
