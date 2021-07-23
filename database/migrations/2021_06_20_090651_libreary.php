<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libreary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libreary', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('publication');
            $table->string('faculty')->nullable();
            $table->string('semester')->nullable();
            $table->integer('total')->nullable();
          
            $table->integer('taken')->nullable();
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
        Schema::dropIfExists('libreary');

    }
}
