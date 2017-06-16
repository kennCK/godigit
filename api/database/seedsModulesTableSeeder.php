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
       DB:: table('menu_settings') -> insert(array(
        //Dashboard
        array('id' => 1, 'parent_id' => 0, 'module' => 'primary_menu', 'title'=>'Dashboard', 'left_icon' => 'fa fa-tachometer', 'right_icon' =>'fa fa-chevron-down', 'method' => 'dashboard', 'rank' => 1),
        array('id' => 2, 'parent_id' => 1, 'module' => 'primary_menu', 'title'=>'Analytics', 'left_icon' => 'fa fa-line-chart', 'right_icon' =>'', 'method' => 'analytics', 'rank' => 1),
        array('id' => 3, 'parent_id' => 1, 'module' => 'primary_menu', 'title'=>'Notification', 'left_icon' => 'fa fa-bell', 'right_icon' =>'', 'method' => 'notification', 'rank' => 2),
        
        //Workforce Management
        array('id' => 10, 'parent_id' => 0, 'module' => 'primary_menu', 'title'=>'Workforce Management', 'left_icon' => 'fa fa-users', 'right_icon' =>'fa fa-chevron-down', 'method' => 'workforce_management', 'rank' => 2),
        array('id' => 11, 'parent_id' => 10, 'module' => 'primary_menu', 'title'=>'Employee Management', 'left_icon' => 'fa fa-users', 'right_icon' =>'', 'method' => 'employee_management', 'rank' => 1),
        array('id' => 12, 'parent_id' => 10, 'module' => 'primary_menu', 'title'=>'Department Management', 'left_icon' => 'fa fa-sitemap', 'right_icon' =>'', 'method' => 'department_management', 'rank' => 2),
        array('id' => 13, 'parent_id' => 10, 'module' => 'primary_menu', 'title'=>'Position Management', 'left_icon' => 'fa fa-address-card', 'right_icon' =>'', 'method' => 'position_management', 'rank' => 3),
        array('id' => 14, 'parent_id' => 10, 'module' => 'primary_menu', 'title'=>'Schedule Management', 'left_icon' => 'fa fa-address-card', 'right_icon' =>'', 'method' => 'schedule_management', 'rank' => 4),
        
        //Salary Management
        array('id' => 20, 'parent_id' => 0, 'module' => 'primary_menu', 'title'=>'Salary Management', 'left_icon' => 'fa fa-credit-card', 'right_icon' =>'fa fa-chevron-down', 'method' => 'salary_management', 'rank' => 3),
        array('id' => 21, 'parent_id' => 20, 'module' => 'primary_menu', 'title'=>'Salary Rate Management', 'left_icon' => 'fa fa-credit-card', 'right_icon' =>'', 'method' => 'salary_rate_management', 'rank' => 1),
        array('id' => 22, 'parent_id' => 20, 'module' => 'primary_menu', 'title'=>'Deductions Management', 'left_icon' => 'fa fa-minus-circle', 'right_icon' =>'', 'method' => 'deductions_management', 'rank' => 2),
        array('id' => 23, 'parent_id' => 20, 'module' => 'primary_menu', 'title'=>'Loans Management', 'left_icon' => 'fa fa-credit-card', 'right_icon' =>'', 'method' => 'loans_management', 'rank' => 3),
        array('id' => 24, 'parent_id' => 20, 'module' => 'primary_menu', 'title'=>'Adjustment Management', 'left_icon' => 'fa fa-adjust', 'right_icon' =>'', 'method' => 'adjustment_management', 'rank' => 4),

        //DTR Management
        array('id' => 30, 'parent_id' => 0, 'module' => 'primary_menu', 'title'=>'DTR Management', 'left_icon' => 'fa fa-clock-o', 'right_icon' =>'', 'method' => 'dtr_management', 'rank' => 4),

        //Payroll
        array('id' => 40, 'parent_id' => 0, 'module' => 'primary_menu', 'title'=>'Payroll', 'left_icon' => 'fa fa-credit-card', 'right_icon' =>'', 'method' => 'paryroll', 'rank' => 5),

        //Settings
         array('id' => 50, 'parent_id' => 0, 'module' => 'primary_menu', 'title'=>'Settings', 'left_icon' => 'fa fa-cog', 'right_icon' =>'fa fa-chevron-down', 'method' => 'settings', 'rank' => 6),
         array('id' => 51, 'parent_id' => 50, 'module' => 'primary_menu', 'title'=>'Account Management', 'left_icon' => 'fa fa-shield', 'right_icon' =>'', 'method' => 'account_management', 'rank' => 1),
         array('id' => 52, 'parent_id' => 50, 'module' => 'primary_menu', 'title'=>'Users Handbook', 'left_icon' => 'fa fa-book', 'right_icon' =>'', 'method' => 'user_guide', 'rank' => 2),
         array('id' => 53, 'parent_id' => 50, 'module' => 'primary_menu', 'title'=>'Video Tutorials', 'left_icon' => 'fa fa-video-camera', 'right_icon' =>'', 'method' => 'video_tutorials', 'rank' => 3),

      ));
    }
}
