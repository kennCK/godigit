<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->char('module',100);
            $table->char('title',100);
            $table->char('left_icon',100);
            $table->char('right_icon',100);
            $table->char('method',100);
            $table->integer('rank');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('menu_settings');
    }
}
