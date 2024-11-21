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
        Schema::create('packages', function (Blueprint $table) {
            $table->string("package_id",8)->primary();
            $table->string("package_type",25);
            $table->string("header",100);
            $table->string("header_url",100);
            $table->string("card_url",100);
            $table->float("price",100);
            $table->text("body");
            $table->dateTime("created_time");
            $table->boolean("is_active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
