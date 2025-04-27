<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // نام دارو
            $table->integer('dosage');
            $table->integer('remaining_dose');                  // تعداد دوز
            $table->enum('reminder_type', ['email', 'sms', 'call', 'notification']); // نوع یادآوری
            $table->integer('frequency'); 
            $table->dateTime('last_reminder');          
            $table->date('start_date');                 // تاریخ شروع
            $table->time('start_time');                 // ساعت شروع
            
            // اضافه کردن فیلد برای شناسه کاربر
            $table->unsignedBigInteger('user_id')->nullable(); // شناسه کاربر

            $table->timestamps();

            // تعریف کلید خارجی
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // حذف کلید خارجی در متد down
        });
        
        Schema::dropIfExists('medicines');
    }
}
