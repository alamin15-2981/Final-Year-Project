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
        Schema::create('company_watch', function (Blueprint $table) {
            $table->id();
            $table->string("url");
            $table->text("description");
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("company_registration");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_watch');
    }
};
