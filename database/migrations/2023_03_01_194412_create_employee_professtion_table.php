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
        Schema::create('employee_profession', function (Blueprint $table) {
            $table->foreignId('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreignId('profession_id')
                ->references('id')
                ->on('professions')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profession');
    }
};
