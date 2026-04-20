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
        Schema::table('guests', function (Blueprint $table) {
            $table->string('event_type')->default('resepsi')->after('id');
        });
        Schema::table('rsvps', function (Blueprint $table) {
            $table->string('event_type')->default('resepsi')->after('id');
        });
        Schema::table('wishes', function (Blueprint $table) {
            $table->string('event_type')->default('resepsi')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn('event_type');
        });
        Schema::table('rsvps', function (Blueprint $table) {
            $table->dropColumn('event_type');
        });
        Schema::table('wishes', function (Blueprint $table) {
            $table->dropColumn('event_type');
        });
    }
};
