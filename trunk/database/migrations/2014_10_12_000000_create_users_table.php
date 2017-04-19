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
            $table->increments('ID');
            $table->string('Username',30)->unique();
            $table->string('Email',50)->unique();
            $table->string('DisplayName',30)->unique();
            $table->string('Password');
            $table->date('BirthDate');
            $table->char('Gender');
            $table->string('Location')->nullable();
            $table->float('TimeZone',2,2);
            $table->boolean('Status')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
