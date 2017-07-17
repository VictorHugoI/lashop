<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_notifications', function (Blueprint $table) {
            $table->increments('id');
            // notifications.id
            $table->uuid('notification_id');

            // notifiable_id and notifiable_type
            $table->morphs('notifiable');
            $table->timestamp('see_at')->nullable();
            $table->timestamp('read_at')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_notifications');
    }
}
