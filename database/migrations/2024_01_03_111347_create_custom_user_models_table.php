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
        Schema::create('custom_users_table', function (Blueprint $table) {
            $table->string('custom_id_column', 40)->primary();
            $table->string('custom_name_column');
            $table->string('custom_email_column')->unique();
            $table->string('custom_password_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_users_table');
    }
};
