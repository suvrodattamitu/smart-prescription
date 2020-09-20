<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionMedicalTestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_medical_test_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prescription_id')->index();
            $table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');
            $table->unsignedBigInteger('medical_test_id')->nullable()->index();
            $table->foreign('medical_test_id')->references('id')->on('medical_tests')->onDelete('cascade');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('prescription_medical_test_details');
    }
}
