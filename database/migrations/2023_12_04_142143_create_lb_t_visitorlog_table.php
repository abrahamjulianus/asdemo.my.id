<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lb_t_visitorlog', function (Blueprint $table) {
            $table->id();
            $table->string('daily_key',20);
            $table->unsignedInteger('daily_no');
            $table->rememberToken();
            $table->unique(['daily_key', 'daily_no', 'remember_token']);
            $table->date('visit_date');
            $table->string('visitor_name');
            $table->string('visitor_company');
            $table->string('visitor_telp');
            $table->string('visitor_email');
            $table->string('pic_name');
            $table->string('pic_department')->nullable();
            $table->longText('purpose');
            $table->timestamp('checkin_time_at')->nullable();
            $table->string('checkin_image')->nullable();
            $table->timestamp('checkout_time_at')->nullable();
            $table->string('checkout_image')->nullable();
            $table->dateTime('duration_datetime')->nullable();
            $table->integer('duration_day')->nullable();
            $table->integer('duration_hours')->nullable();
            $table->integer('duration_minutes')->nullable();
            $table->integer('duration_seconds')->nullable();
            $table->integer('visit_status')->default(0);
            $table->string('location_longitude')->nullable();
            $table->string('location_latitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lb_t_visitorlog');
    }
};
