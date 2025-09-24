<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('notifications', function (Blueprint $t) {
      $t->id();
      $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $t->string('type')->nullable(); 
      $t->text('message');
      $t->boolean('is_read')->default(false);
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('notifications'); }
};
