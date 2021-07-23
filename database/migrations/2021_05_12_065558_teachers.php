<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('contact')->nullable();
            $table->string('email');
            $table->string('subject');
            $table->string('bloodgroup')->nullable();
            $table->string('dob')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('join_date')->nullable();
            $table->string('education')->nullable(); 
            $table->string('images')->nullable(); 
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
        Schema::dropIfExists('teachers');

    }
}
