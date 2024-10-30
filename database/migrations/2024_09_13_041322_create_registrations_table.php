<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->enum('semester', range(1, 8));
            $table->float('gpa')->default(0.00); // GPA with default value
            $table->enum('scholarship_type', ['none', 'academic', 'non_academic'])->default('none'); // Scholarship type
            $table->string('document')->nullable(); // For document upload (jpg, etc.)
            $table->string('status')->default('pending'); // Status of the submission
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
