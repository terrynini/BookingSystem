<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIoiReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ioi_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->text('email');
            $table->string('identity_code',15);
            $table->smallInteger('identity_type');
            $table->string('department');
            $table->char('phone',10);
            $table->integer('event_id')->index();
            $table->string('cancel_code');
            $table->timestamp('cancel_at');
            $table->timestamp('checked_in_at');
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
        Schema::dropIfExists('ioi_reservations');
    }
}
