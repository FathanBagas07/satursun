<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('selections', function (Blueprint $t) {
      $t->id();
      $t->foreignId('job_id')->constrained('job_listings')->cascadeOnDelete();
      $t->foreignId('application_id')->constrained('applications')->cascadeOnDelete();
      $t->timestamp('selected_at');
      $t->timestamps();
      $t->unique('job_id');
    });
  }
  public function down(): void { Schema::dropIfExists('selections'); }
};
