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
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('hotel_title')->required();
            $table->string('room_number')->required();
            $table->string('bed_type')->required();
            $table->string('status')->required();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('hotel_title');
            $table->dropColumn('room_number');
            $table->dropColumn('bed_type');
            $table->dropColumn('status');
        });
    }
};
