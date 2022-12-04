<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->id();
            $table->string('workspace');
            $table->string('states')->default('new');

            
            $table->string('ap_email')->unique()->nullable();
            $table->string('ap_mobile')->nullable();
            $table->string('ap_name')->nullable();

            $table->string('kind')->nullable();
            $table->string('address')->nullable();
            $table->integer('iban')->nullable();
            $table->string('cr')->nullable();
            $table->string('p_o_box')->nullable();
            $table->string('city')->nullable();
            $table->text('notes')->nullable();
            $table->string('site')->nullable();

            $table->string('created_by')->nullable();

            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('source_id')->unsigned()->nullable();
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
