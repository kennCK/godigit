<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('company');
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_type');
            $table->string('name');
            $table->string('code',15);
            $table->string('address');
            $table->string('contact_number',15);
            $table->string('fax_number',15);
            $table->string('email',100);
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('core_values')->nullable();
            $table->longText('social_responsibilities')->nullable();
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
        Schema::dropIfExists('company');
    }
}
