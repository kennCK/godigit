<?php

use Illuminate\Database\Seeder;
Use Illuminate\Database\Eloquent\Model;
use App\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();

      DB::table('departments')->delete();

      $entries = array(
          ['id' => 0, 'parent_id' => '0', 'description' => 'Company'],
      );

      // Loop through each user above and create the record for them in the database
      foreach ($entries as $entry)
      {
          Department::create($entry);
      }

      Model::reguard();
    }
}
