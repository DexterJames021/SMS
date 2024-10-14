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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->string('course');
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

    // id	firstname	lastname	middlename	course	email	contactnumber	country	streetaddress	city	fathername	mothername	guardiancontactnumber	status	admission_date	created_at	updated_at
    // Query results operations
    // users[0][createpassword]= int
    // users[0][username]= string
    // users[0][auth]= string
    // users[0][password]= string
    // users[0][firstname]= string
    // users[0][lastname]= string
    // users[0][email]= string
    // users[0][maildisplay]= int
    // users[0][city]= string
    // users[0][country]= string
    // users[0][timezone]= string
    // users[0][description]= string
    // users[0][firstnamephonetic]= string
    // users[0][lastnamephonetic]= string
    // users[0][middlename]= string
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
