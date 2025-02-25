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
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('member_family_id')->nullable()->after('email');
            $table->text('remark')->nullable()->after('member_family_id');

            $table->foreign('member_family_id')->references('id')->on('member_families')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['member_family_id']);
            $table->dropColumn(['member_family_id', 'remark']);
        });
    }
};
