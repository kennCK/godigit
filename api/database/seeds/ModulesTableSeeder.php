<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB:: table('modules') -> insert(array(
        //Dashboard
        array('id' => 1, 'parent_id' => 0,  'description'=>'Dashboard', 'icon' => 'fa fa-tachometer', 'path' => 'dashboard', 'rank' => 1),
        array('id' => 2, 'parent_id' => 1,  'description'=>'Analytics', 'icon' => 'fa fa-line-chart',  'path' => 'analytics', 'rank' => 1),
        array('id' => 3, 'parent_id' => 1,  'description'=>'Notification', 'icon' => 'fa fa-bell',  'path' => 'notification', 'rank' => 2),
        
        //Workforce Management
        array('id' => 10, 'parent_id' => 0,  'description'=>'Workforce Management', 'icon' => 'fa fa-users',  'path' => 'workforce_management', 'rank' => 2),
        array('id' => 11, 'parent_id' => 10,  'description'=>'Employee Management', 'icon' => 'fa fa-users',  'path' => 'employee_management', 'rank' => 1),
        array('id' => 12, 'parent_id' => 10,  'description'=>'Department Management', 'icon' => 'fa fa-sitemap',  'path' => 'department_management', 'rank' => 2),
        array('id' => 13, 'parent_id' => 10,  'description'=>'Position Management', 'icon' => 'fa fa-address-card',  'path' => 'position_management', 'rank' => 3),
        array('id' => 14, 'parent_id' => 10,  'description'=>'Schedule Management', 'icon' => 'fa fa-address-card',  'path' => 'schedule_management', 'rank' => 4),
        
        //Salary Management
        array('id' => 20, 'parent_id' => 0,  'description'=>'Salary Management', 'icon' => 'fa fa-credit-card',  'path' => 'salary_management', 'rank' => 3),
        array('id' => 21, 'parent_id' => 20,  'description'=>'Salary Rate Management', 'icon' => 'fa fa-credit-card',  'path' => 'salary_rate_management', 'rank' => 1),
        array('id' => 22, 'parent_id' => 20,  'description'=>'Deductions Management', 'icon' => 'fa fa-minus-circle',  'path' => 'deductions_management', 'rank' => 2),
        array('id' => 23, 'parent_id' => 20,  'description'=>'Loans Management', 'icon' => 'fa fa-credit-card',  'path' => 'loans_management', 'rank' => 3),
        array('id' => 24, 'parent_id' => 20,  'description'=>'Adjustment Management', 'icon' => 'fa fa-adjust',  'path' => 'adjustment_management', 'rank' => 4),

        //DTR Management
        array('id' => 30, 'parent_id' => 0,  'description'=>'DTR Management', 'icon' => 'fa fa-clock-o',  'path' => 'dtr_management', 'rank' => 4),

        //Payroll
        array('id' => 40, 'parent_id' => 0,  'description'=>'Payroll', 'icon' => 'fa fa-credit-card',  'path' => 'paryroll', 'rank' => 5),

        //Settings
         array('id' => 50, 'parent_id' => 0,  'description'=>'Settings', 'icon' => 'fa fa-cog',  'path' => 'settings', 'rank' => 6),
         array('id' => 51, 'parent_id' => 50,  'description'=>'Account Management', 'icon' => 'fa fa-shield',  'path' => 'account_management', 'rank' => 1),
         array('id' => 52, 'parent_id' => 50,  'description'=>'Users Handbook', 'icon' => 'fa fa-book',  'path' => 'user_guide', 'rank' => 2),
         array('id' => 53, 'parent_id' => 50,  'description'=>'Video Tutorials', 'icon' => 'fa fa-video-camera',  'path' => 'video_tutorials', 'rank' => 3),

      ));
    }
}
