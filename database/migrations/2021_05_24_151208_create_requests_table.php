<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('mo_ta');
            $table->unsignedBigInteger('id_the_loai')->nullable();
            $table->date('due_date');
            $table->string('comment');
            $table->unsignedBigInteger('toID')->nullable();
            $table->integer('do_uu_tien');
            $table->integer('status');
            $table->unsignedBigInteger('fromID')->nullable();
            
            

        });
        Schema::table('requests', function($table) {
            $table->foreign('id_the_loai')->references('id')->on('category');
            $table->foreign('toID')->references('id')->on('users');
            $table->foreign('fromID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
