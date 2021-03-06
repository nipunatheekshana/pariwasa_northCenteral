<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGramasevaDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gramaseva_divisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisionalSecretariatID');
            $table->foreign('divisionalSecretariatID')->references('id')->on('divisional_secretariats')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('gramaseva_divisions');
    }
}
