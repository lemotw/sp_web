<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Basic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->text('img_link');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('issue_list', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('issue_id');
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
        Schema::drop('member');
    }
}
