<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompaniesDeleteBusinessType extends Migration
{
    /**
     * Run the migrations.
     * For Pull Request
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('business_type');
        Schema::table('companies', function(Blueprint $table){
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('core_values')->nullable();
            $table->longText('social_responsibilities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
