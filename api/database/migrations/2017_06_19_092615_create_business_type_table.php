<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('business_type');
        Schema::create('business_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });

         Artisan::call('db:seed', array('--class' => 'BusinessTypeTableSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_type');
    }
}
