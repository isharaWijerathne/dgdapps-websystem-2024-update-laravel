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
        Schema::create('news_imgs', function (Blueprint $table) {
            $table->string("news_imgs_id")->primary();
            $table->string("news_id")->nullable();
            $table->string("img_location");
            $table->boolean("is_active");

            //set fk
            $table->foreign('news_id')->references('news_id')->on('news')->onUpdate("NO ACTION")->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_imgs');
    }
};
