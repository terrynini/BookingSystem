<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->text('email');
            $table->string('identity_code',15);
            $table->string('department');
            $table->string('class');
            $table->char('phone',20);
            $table->integer('pretest');
            $table->integer('posttest');
            $table->integer('practice');
            $table->integer('event_id')->index();
            $table->string('cancel_code');
            $table->timestamp('updated_at');
            $table->timestamp('cancel_at');
            $table->timestamp('checked_in_at');
            $table->timestamp('created_at');
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
        Schema::dropIfExists('body_reservations');
    }
}
