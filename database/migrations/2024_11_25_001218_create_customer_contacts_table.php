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
        Schema::create('customer_contacts', function (Blueprint $table) {
           // $table->id();
           $table->string('contact_id',8)->primary();
           $table->string('customer_name',150);
           $table->string('email',100);
           $table->string('contact_number',15);
           $table->string('selected_package',25);
           $table->unsignedBigInteger('mk_id')->nullable();
           $table->text('mm_ans');
           $table->string("status",15);
           $table->boolean("is_mk_can_reply");
            $table->timestamps();


            //setFk
            $table->foreign('mk_id')->references('id')->on('marketing_managers')->onUpdate("NO ACTION")->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_contacts');
    }
};
