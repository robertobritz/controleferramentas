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
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->string('machine_name');
            $table->string('tool_name')->nullable();
            $table->unsignedBigInteger('machine_id')->require;
            $table->unsignedBigInteger('tool_id')->nullable();
            $table->timestamps();

            $table->foreign('machine_id')
                        ->references('id')
                        ->on('machines');
            $table->foreign('tool_id')
                        ->references('id')
                        ->on('tools');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazines');
    }
};
