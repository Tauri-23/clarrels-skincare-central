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
        Schema::create('appointments', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('patient', 6)->nullable(); //Foreign
            $table->string('doctor', 6)->nullable(); //Foreign
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('service_type');
            $table->string('service');
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->string('note');
            $table->string('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Foreign Keys
             */
            $table->foreign('patient')
                ->references('id')
                ->on('patients')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('doctor')
                ->references('id')
                ->on('doctors')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
