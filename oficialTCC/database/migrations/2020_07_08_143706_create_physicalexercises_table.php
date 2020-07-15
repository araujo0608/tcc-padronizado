<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalexercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicalexercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 30);
            $table->string('areamuscular', 30);
            $table->string('aparelho', 30);
            $table->enum('letra', ['A', 'B', 'C', 'D', 'E']);
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
        Schema::dropIfExists('physicalexercises');
    }
}
