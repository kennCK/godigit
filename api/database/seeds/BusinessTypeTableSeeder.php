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
        DB:: table('business_types') -> insert(array(
          array("id" => "1","title" => "Call Center", "description" => "This is a Sample"),
        ));
    }
}
