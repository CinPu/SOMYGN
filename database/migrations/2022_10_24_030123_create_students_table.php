<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('barcode');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->bigInteger('major_id')->unsigned();
            $table->bigInteger('minor1_id')->unsigned();
            $table->bigInteger('minor2_id')->unsigned()->nullable();
            $table->tinyInteger('elective_course')->default(0);
            $table->double('fee')->default(0);
            $table->double('paid')->default(0);
            $table->string('address')->nullable();
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
        Schema::dropIfExists('students');
    }
};
