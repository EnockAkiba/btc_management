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
        Schema::create('applays', function (Blueprint $table) {
            $table->id();        
            $table->foreignId('quiz_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('register_id')->onDelete('cascade')->onUpdate('cascade');
            $table->text('content')->nullable();
            $table->string('file')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('applays');
    }
};
