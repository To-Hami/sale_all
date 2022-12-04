<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string( 'created_by' )->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('source');
    }
    
};
