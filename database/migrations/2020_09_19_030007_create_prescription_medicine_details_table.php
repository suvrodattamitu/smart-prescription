<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionMedicineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_medicine_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prescription_id')->index();
            $table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');
            $table->unsignedBigInteger('type_id')->nullable()->index();
            $table->foreign('type_id')->references('id')->on('medicine_types')->onDelete('cascade');
            $table->unsignedBigInteger('medicine_id')->nullable()->index();
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->boolean('eating_time_breakfast')->default(0);//breakfast lunch dinner
            $table->boolean('eating_time_lunch')->default(0);//breakfast lunch dinner
            $table->boolean('eating_time_dinner')->default(0);//breakfast lunch dinner
            $table->boolean('eating_term')->nullable();//b a
            $table->string('days')->nullable(); //10
            $table->string('duration')->nullable(); //days/months/years/continue
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
        Schema::dropIfExists('prescription_medicine_details');
    }
}
