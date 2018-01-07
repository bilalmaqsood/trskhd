<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_type_id')->unsigned();
            $table->tinyInteger('Activated');
            $table->tinyInteger('Enabled');
            $table->string('FirstName');
            $table->string('lastName');
            $table->string('Email')->unique();
            $table->date('DOB');
            $table->integer('CNICNo');
            $table->string('Mobile',20);
            $table->string('Gender',1);
            $table->string('Religion',50);
            $table->string('Nationality',50);
            $table->string('Address');
            $table->integer('country_id');
            $table->string('Image');
            $table->string('Password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
