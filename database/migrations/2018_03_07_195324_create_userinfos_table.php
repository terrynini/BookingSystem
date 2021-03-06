<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type')->nullable();
            $table->text('email')->nullable();
            $table->string('identity_code');
            $table->string('department')->nullable();
            $table->string('group')->nullable();
            $table->string('title')->nullable();
            $table->char('phone',10)->nullable();
            $table->integer('privilege')->unsigned();
            $table->timestamps();
            $table->unique(array('name', 'identity_code'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userinfos');
    }
}
