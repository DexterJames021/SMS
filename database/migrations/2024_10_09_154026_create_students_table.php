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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('course')->nullable();
            $table->string('email')->unique();
            $table->string('contactnumber')->unique();
            $table->string('country');
            $table->text('streetaddress')->nullable();
            $table->string('city');
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('guardiancontactnumber');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('admission_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
