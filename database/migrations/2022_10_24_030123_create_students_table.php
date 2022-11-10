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
            $table->string('profile',100)->nullable();
            $table->string('student_id')->unique();
            $table->string('barcode',20);
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('phone',20)->unique();
            $table->bigInteger('major_id')->unsigned();
            $table->bigInteger('minor1_id')->unsigned();
            $table->bigInteger('minor2_id')->unsigned()->nullable();
            $table->tinyInteger('elective_course')->default(0);
            $table->double('fee',10)->default(0);
            $table->double('paid',10)->default(0);
            $table->string('address',100)->nullable();
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
