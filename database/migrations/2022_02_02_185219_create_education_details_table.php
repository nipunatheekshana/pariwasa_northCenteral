<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id');
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->string('school_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('grade')->nullable();
            $table->string('school_subjects')->nullable();
            $table->string('skills')->nullable();
            $table->string('aesthetics')->nullable();
            $table->string('extra_curiculars')->nullable();
            $table->string('diploma_address')->nullable();
            $table->string('diploma_contactNum')->nullable();
            $table->string('diploma_subjects')->nullable();
            $table->string('diploma_higherEducation')->nullable();
            $table->string('uni_address')->nullable();
            $table->string('uni_contact_num')->nullable();
            $table->string('uni_subjects')->nullable();
            $table->string('probation_officers_followUp')->nullable();
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
        Schema::dropIfExists('education_details');
    }
}
