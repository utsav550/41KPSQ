<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->String('fname');
            $table->String('lname');
            $table->string('email');
            $table->string('mobile');
            $table->date('dob');
            $table->string('gender');
            $table->string('village');
            $table->string('address');
            $table->string('suburb');
            $table->string('state');
            $table->string('postcode');
            $table->string('privacy');
            $table->string('visa');
            $table->string('password');
            


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
        Schema::dropIfExists('members');
    }
}
