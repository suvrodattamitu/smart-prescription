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
            $table->integer('visiting_no');
            $table->string('name');
            $table->integer('age');
            $table->integer('regi_no');
            $table->boolean('gender');
            $table->boolean('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('c_c');
            $table->string('on_exam');
            $table->string('p_a_exam')->nullable();
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
