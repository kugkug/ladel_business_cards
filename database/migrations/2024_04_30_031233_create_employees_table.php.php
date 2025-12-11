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
            $table->string('id_no')->unique();
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->string('department');
            $table->string('position_title');
            $table->string('employee_number');
            $table->string('employee_number_alt');
            $table->text('address');
            $table->string('contact_person');
            $table->string('contact_person_number');                    
            $table->timestamps();
            $table->index(['id_no']);
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
