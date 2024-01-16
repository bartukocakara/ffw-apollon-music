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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('avatar')->default('/uploads/avatar.png');
            $table->string('name');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('email')->unique();
            $table->string('id_no')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_licence_approved')->default(false);
            $table->boolean('is_privacy_approved')->default(false);
            $table->boolean('is_gdpr_approved')->default(false);
            $table->boolean('google_id')->after('remember_token')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
