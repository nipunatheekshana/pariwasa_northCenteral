<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id');
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->string('mothers_name')->nullable();
            $table->date('mothers_DOB')->nullable();
            $table->string('mothers_address')->nullable();
            $table->string('mothers_tp_no')->nullable();
            $table->string('mothers_job')->nullable();
            $table->string('mothers_religion')->nullable();
            $table->string('mothers_education_qulifications')->nullable();
            $table->string('fathers_name')->nullable();
            $table->date('fathers_DOB')->nullable();
            $table->string('fathers_address')->nullable();
            $table->string('fathers_tp_no')->nullable();
            $table->string('fathers_job')->nullable();
            $table->integer('number_of_siblings')->nullable();
            $table->string('status_of_marriadge')->nullable();
            $table->string('disabilities_of_parents',500)->nullable();



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
        Schema::dropIfExists('parents');
    }
}
