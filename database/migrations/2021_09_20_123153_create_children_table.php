<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('probation_center_id');
            $table->foreign('probation_center_id')->references('probation_center_id')->on('probation_centers')->onDelete('cascade');
            $table->string('full_name');
            $table->string('image')->nullable();
            $table->date('DOB')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_certificate')->nullable(); //1 =has 2 = dont have 3= in progress
            $table->string('helth_status',500)->nullable();
            $table->string('how_entered')->nullable();
            $table->string('case_number')->nullable();
            $table->string('Entered_divition')->nullable();
            $table->string('court')->nullable();
            $table->string('crime_commited',500)->nullable();
            $table->date('date_entered')->nullable();
            $table->string('status_before_enter',500)->nullable();
            $table->string('status_after_enter',500)->nullable();
            $table->string('disability',500)->nullable();
            $table->boolean('hasParents');
            $table->boolean('hasEducation');
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
        Schema::dropIfExists('children');
    }
}
