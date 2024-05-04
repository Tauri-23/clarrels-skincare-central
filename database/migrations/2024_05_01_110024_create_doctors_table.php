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
        Schema::create('doctors', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->string('firstname');
            $table->string('lastname');

            $table->string('prc_number');
            $table->string('doctor_type');

            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('phone');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('address');
            $table->string('pfp');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
