<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->decimal('budget_min', 10, 2)->nullable()->after('description');
            $table->decimal('budget_max', 10, 2)->nullable()->after('budget_min');
            // $table->decimal('budget', 10, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropColumn(['budget_min', 'budget_max']);
            $table->decimal('budget', 10, 2)->nullable(false)->change();
        });
    }
};