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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
                      
            $table->unsignedBigInteger('event_type_id');
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('deleted_at')->nullable();             
            $table->timestamps();

            $table->foreign('event_type_id')
            ->references('id')
            ->on('event_types')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
