<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProbationUnitEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probation_unit_employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->foreignId('Probation_unit_id');
            $table->foreign('Probation_unit_id')->references('Probation_unit_id')->on('probation_units')->onDelete('cascade');
            $table->string('full_name');
            $table->string('address');
            $table->string('designation');
            $table->string('grade');
            $table->string('tp_no');
            $table->string('gender');
            $table->string('NIC_no');
            $table->string('date_of_employeement_at_probational_unit');
            $table->string('working_divitional_secretariat');
            $table->string('working_police_divition');
            $table->string('working_equipment')->nullable();
            $table->string('DOB');
            $table->string('email');
            $table->string('date_of_employeement');
            $table->string('pension_no');
            $table->string('basic_salary');
            $table->string('image')->nullable();
            $table->string('Incriment_date')->nullable();
            $table->string('incriment_value')->nullable();
            $table->string('Education_qualifications')->nullable();
            $table->string('other_qualification')->nullable();
            $table->string('courses_falloed_by_the_institute')->nullable();
            $table->string('courses_hope_to_fallow')->nullable();
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
        Schema::dropIfExists('probation_unit_employees');
    }
}
