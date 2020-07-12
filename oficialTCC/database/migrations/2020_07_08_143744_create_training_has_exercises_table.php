<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingHasExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_has_exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idexercicio');
            $table->unsignedBigInteger('idficha');
            $table->integer('serie');
            $table->integer('repeticao');
            $table->integer('intervalo');
            $table->text('obs');
            $table->foreign('idexercicio')->references('id')->on('physicalexercises')->onDelete('cascade');
            $table->foreign('idficha')->references('id')->on('trainingsheets')->onDelete('cascade');
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
        Schema::dropIfExists('training_has_exercises');
    }
}
