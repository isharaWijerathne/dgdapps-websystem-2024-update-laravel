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
        Schema::create('package_imgs', function (Blueprint $table) {
            $table->string("package_imgs_id")->primary();
            $table->string("package_id")->nullable();
            $table->string("img_location");
            $table->boolean("is_active");

            //set fk
            $table->foreign('package_id')->references('package_id')->on('packages')->onUpdate("NO ACTION")->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_imgs');
    }
};
