<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('dosage');
            $table->integer('remaining_dose');
            $table->integer('frequency');
            $table->date('start_date');
            $table->time('start_time');
            $table->timestamp('last_reminder');
            $table->enum('reminder_type', ['email', 'sms', 'notification']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drugs');
    }
};
