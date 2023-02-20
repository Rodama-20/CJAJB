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
        Schema::create('athlete_dicipline', function (Blueprint $table) {
            $table->id();
            $table->foreignId('athlete_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dicipline_id')->constrained()->onDelete('cascade')->onUpdate('restrict');
            $table->float('pb');
            $table->dateTimeTz('pb_date');
            $table->string('pb_event');
            $table->float('sb')->nullable();
            $table->dateTimeTz('sb_date')->nullable();
            $table->string('sb_event')->nullable();
            $table->timestamps();
            $table->unique(['athlete_id', 'dicipline_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athlete_pb_sb');
    }
};
