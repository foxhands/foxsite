<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('freelancehunt_id');
            $table->string('employer_first_name');
            $table->string('employer_last_name');
            $table->string('employer_login');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->text('response')->nullable();
            $table->integer('answer')->default(0);
            $table->integer('budget');
            $table->dateTime('deadline');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
