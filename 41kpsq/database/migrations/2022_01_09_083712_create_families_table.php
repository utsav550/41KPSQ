<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->integer('head_id');
            $table->integer('member1_id');
            $table->string('member1_relation');
            $table->integer('member2_id');
            $table->string('member2_relation');
            $table->integer('member3_id');
            $table->string('member3_relation');
            $table->integer('member4_id');
            $table->string('member4_relation');
            $table->integer('member5_id');
            $table->string('member5_relation');
            $table->integer('member6_id');
            $table->string('member6_relation');
            $table->integer('member7_id');
            $table->string('member7_relation');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
