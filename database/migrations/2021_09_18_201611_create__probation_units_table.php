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
            $table->string('address')->nullable();;
            $table->integer('district');
            $table->integer('divitional_secretariat');
            $table->integer('senior_officer')->nullable();
            $table->integer('officer_incharge')->nullable();
            $table->string('tp_no')->nullable();;
            $table->string('fax')->nullable();
            $table->string('email')->nullable();;
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
