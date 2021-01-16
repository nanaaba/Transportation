<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->uuid('userId');
            $table->uuid('companyId');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('usergroup');
            $table->string('contactno')->nullable();
            $table->integer('active')->default(0);
            $table->string('createdBy')->nullable();
            $table->string('updatedBy')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
