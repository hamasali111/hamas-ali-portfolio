<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->date('visited_on');
            $table->string('page', 100)->default('/');
            $table->unsignedBigInteger('hits')->default(0);
            $table->unique(['visited_on', 'page']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
