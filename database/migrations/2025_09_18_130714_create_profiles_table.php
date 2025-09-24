<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('profiles', function (Blueprint $t) {
      $t->id();
      $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $t->string('photo')->nullable();
      $t->string('phone')->nullable();
      $t->string('last_education')->nullable();
      $t->text('bio')->nullable();
      $t->json('skills')->nullable();
      $t->json('hard_skills')->nullable();
      $t->json('soft_skills')->nullable();
      $t->json('links')->nullable();
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('profiles'); }
};
