<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('job_listings', function (Blueprint $t) {
      $t->id();
      $t->foreignId('poster_id')->constrained('users')->cascadeOnDelete();
      $t->string('title');
      $t->text('description');
      $t->date('deadline')->nullable();
      $t->string('location')->nullable();
      $t->enum('status', ['open','selected','closed'])->default('open');
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('job_listings'); }
};
