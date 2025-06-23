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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("course_id")->constrained("courses")->noActionOnDelete();
            $table->foreignId("user_id")->constrained("users")->noActionOnDelete();
            $table->string("session_id");
            $table->enum("payment_status", ["paid", "unpaid"])->nullable()->default(null);
            $table->enum("status", ["complete", "expired", "open"])->nullable()->default(null);
            $table->float("amount")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
