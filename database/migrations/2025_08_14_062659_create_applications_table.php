<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // applicant
            $table->json('countries')->nullable(); // store multiple countries as array
            $table->date('earliest_fly_date')->nullable();
            $table->string('call_time')->nullable(); // "Anytime" or custom time
            $table->string('referred_by')->nullable();

            // Status & Remarks
            $table->string('status')->default('For Review');
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

