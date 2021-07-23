<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
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
            $table->integer('student_roll')->unique();
            $table->text('student_name');
            $table->string('DOA')->nullable();
            $table->string('DOB');
            $table->string('course_name');
            $table->string('gender')->nullable();
            $table->string('session');
            $table->string('semester');
            $table->string('contact');
            $table->string('nationality')->nullable();
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->string('per_address')->nullable();
            $table->string('temp_address');
            $table->string('email');
            $table->string('guardian_name');
            $table->string('guardian_contact');
            $table->string('academic_information')->nullable();
            $table->string('image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
}
