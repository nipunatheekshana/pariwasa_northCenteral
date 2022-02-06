<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProbationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probation_centers', function (Blueprint $table) {
            $table->id('probation_center_id');
            $table->foreignId('Probation_unit_id');
            $table->foreign('Probation_unit_id')->references('Probation_unit_id')->on('probation_units')->onDelete('cascade');
            $table->string('name');
            $table->string('date_started')->nullable();
            $table->string('catagory')->nullable();
            $table->string('district')->nullable();
            $table->string('divitional_secretariat')->nullable();
            $table->string('address')->nullable();
            $table->string('tp_no')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('fund')->nullable();
            $table->string('gramaseva_divition')->nullable();
            $table->string('maximum_children_capacity')->nullable();
            $table->string('number_of_children')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probation_centers');
    }
}
