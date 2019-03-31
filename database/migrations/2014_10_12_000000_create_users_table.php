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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email',30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status',10);
            $table->string('gender',15)->nullable();
            $table->string('id_province',2)->nullable();
            $table->string('id_city',4)->nullable();
            $table->string('id_district',7)->nullable();
            $table->string('id_village',10)->nullable();
            $table->longText('address')->nullable();
            $table->string('foto',200)->nullable();
            $table->string('telp',15)->nullable();
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
