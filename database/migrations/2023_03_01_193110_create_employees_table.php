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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table
                ->enum('gender', [
                    'Mlle.',
                    'Mme.',
                    'Mr.',
                    'Prof.',
                    'Dr.',
                    'Autre',
                ])
                ->default('Mlle.');
            $table->date('birth_date')->nullable();
            $table
                ->string('Phone')
                ->nullable()
                ->unique();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
