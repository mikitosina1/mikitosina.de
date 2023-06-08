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
        Schema::create('feedback_mails', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("");
            $table->string('email')->default("");
            $table->string('subject')->default("");
            $table->text('message')->default("");
            $table->integer('by_user')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_mails');
    }
};
