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
            $table->string('title');
            $table->string('full_name')->nullable();
            $table->string('initials');
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('grade')->nullable();
            $table->string('tp_no')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('NIC_no')->unique()->nullable();
            $table->string('date_of_employeement_at_probational_unit')->nullable();
            $table->string('working_divitional_secretariat')->nullable();
            $table->string('working_police_divition')->nullable();
            $table->string('working_equipment')->nullable();
            $table->string('DOB')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_employeement')->nullable();
            $table->string('pension_no')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('image')->nullable();
            $table->string('Incriment_date')->nullable();
            $table->string('incriment_value')->nullable();
            $table->string('Education_qualifications')->nullable();
            $table->string('other_qualification')->nullable();
            $table->string('courses_falloed_by_the_institute')->nullable();
            $table->string('courses_hope_to_fallow')->nullable();
            $table->boolean('isExecutive')->default(false);
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
