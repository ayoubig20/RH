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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('document')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('budget')->nullable();
            $table->enum('priority', ['highest', 'medium', 'low', 'lowest']);
            $table->text('description')->nullable();
            $table->integer('progression')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

