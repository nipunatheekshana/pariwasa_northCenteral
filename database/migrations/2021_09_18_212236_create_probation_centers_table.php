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
            $table->string('date_started');
            $table->string('catagory');
            $table->string('district');
            $table->string('divitional_secretariat');
            $table->string('address');
            $table->string('tp_no');
            $table->string('registration_no');
            $table->string('registration_date');
            $table->string('fund');
            $table->string('number_Of_stalf');
            $table->string('gramaseva_divition');
            $table->string('maximum_children_capacity');
            $table->string('minimum_children_capacity');
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
