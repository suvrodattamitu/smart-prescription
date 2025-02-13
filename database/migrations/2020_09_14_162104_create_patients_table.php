<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('visiting_no')->nullable();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->integer('regi_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            // $table->string('c_c')->nullable();
            // $table->string('on_exam')->nullable();
            // $table->string('p_a_exam')->nullable();
            $table->boolean('is_prescribed')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
