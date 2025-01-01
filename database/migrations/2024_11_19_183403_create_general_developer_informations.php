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
        Schema::create('general_developer_informations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->integer('years_of_experience')->default(0);
            $table->integer('projects')->default(0);
            $table->string('phone')->nullable();
            $table->string('address')->nullable(false);
            $table->string('email')->nullable(false);
            $table->longText('what_i_know')->nullable(false);
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_developer_informations');
    }
};
