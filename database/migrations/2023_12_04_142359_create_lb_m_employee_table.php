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
        Schema::create('lb_m_employee', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name');
            $table->string('emp_department');
            $table->string('emp_position')->nullable();
            $table->string('emp_telp')->nullable();
            $table->string('emp_email')->nullable();
            $table->unique(['emp_name', 'emp_email', 'emp_position']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lb_m_employee');
    }
};
