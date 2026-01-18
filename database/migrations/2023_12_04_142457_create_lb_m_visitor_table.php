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
        Schema::create('lb_m_visitor', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('visitor_company');
            $table->string('visitor_position')->nullable();
            $table->string('visitor_telp');
            $table->string('visitor_email');
            $table->unique(['visitor_name', 'visitor_company', 'visitor_email']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lb_m_visitor');
    }
};
