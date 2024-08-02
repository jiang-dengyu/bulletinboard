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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('announcement_title');
            $table->string('content');
            $table->string('attachment');
            $table->string('image');
            $table->boolean('stage');
            $table->integer('announcement_category_id');
            $table->integer('department_id');
            $table->dateTime('publish_date', precision: 0);
            $table->dateTime('remove_date', precision: 0);
            $table->timestamps();  //auto create_at + update_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement');
    }
};
