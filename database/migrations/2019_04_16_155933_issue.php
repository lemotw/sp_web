<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Issue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('contact')->nullable();
            $table->text('describe');
            $table->integer('process_state');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('issue_answer', function(Blueprint $table){
            $table->increments('id');
            $table->integer('issue_id');
            $table->text('reply');
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
        Schema::drop('issue');
        Schema::drop('issue_answer');
    }
}
