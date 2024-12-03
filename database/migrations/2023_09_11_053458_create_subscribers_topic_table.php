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
        Schema::create('subscribers_topic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscribers_id');
            $table->unsignedBigInteger('topics_id');
            $table->foreign('topics_id')
            ->references('id')
            ->on('topics')->onDelete('cascade');
      $table->foreign('subscribers_id')
            ->references('id')
            ->on('subscribers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers_topic');
    }
};
