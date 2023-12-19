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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departement_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('extension_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('slug');
            $table->string('designation');
            $table->string('price');
            $table->date('dateBegin');
            $table->date('dateEnd');
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
        Schema::dropIfExists('promotions');
    }
    
};
