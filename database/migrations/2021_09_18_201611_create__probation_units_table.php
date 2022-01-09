<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProbationUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probation_units', function (Blueprint $table) {
            $table->id('Probation_unit_id');
            $table->string('name');
            $table->string('address');
            $table->integer('district');
            $table->integer('divitional_secretariat');
            $table->string('senior_officer');
            $table->string('officer_incharge');
            $table->string('tp_no');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('_probation_units');
    }
}
