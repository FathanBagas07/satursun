<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('applications', function (Blueprint $t) {
      $t->id();
      $t->foreignId('job_id')->constrained('job_listings')->cascadeOnDelete();
      $t->foreignId('applicant_id')->constrained('users')->cascadeOnDelete();
      $t->text('note')->nullable();
      $t->string('cv_path');
      $t->enum('status', ['in_review','accepted','rejected'])->default('in_review');
      $t->timestamps();
      $t->unique(['job_id','applicant_id']);
    });
  }
  public function down(): void { Schema::dropIfExists('applications'); }
};
