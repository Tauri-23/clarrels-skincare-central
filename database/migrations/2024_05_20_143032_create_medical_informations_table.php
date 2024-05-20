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
        Schema::create('medical_informations', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('patient', 6)->nullable(); //Foreign
            $table->string('allergies');
            $table->string('heart_disease');
            $table->string('high_blood_pressure');
            $table->string('diabetic');
            $table->string('surgeries');
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_informations');
    }
};
