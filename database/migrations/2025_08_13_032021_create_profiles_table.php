<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_profiles_table.php
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Applicant info
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->date('birthdate')->nullable();

            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality_city')->nullable();
            $table->string('province')->nullable();

            $table->string('contact_number');
            $table->string('alternative_number')->nullable();
            $table->string('email_address')->nullable();

            $table->string('civil_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_contact_number')->nullable();

            $table->string('highest_educational_attainment')->nullable();

            $table->boolean('is_ex_abroad')->default(false);
            $table->string('last_country')->nullable();
            $table->integer('years_abroad')->nullable();

            $table->string('application_type')->nullable(); // Domestic Works, Skilled, Professional
            $table->date('earliest_availability')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
