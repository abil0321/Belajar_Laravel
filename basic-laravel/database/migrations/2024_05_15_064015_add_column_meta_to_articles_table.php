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
        Schema::table('articles', function (Blueprint $table) {
            // $table->string('meta_title')->nullable();
            // $table->string('meta_title')->after('body')->nullable();

            $table->after('body', function($table){
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description']);
            // $table->dropColumn('meta_title');
            // $table->dropColumn('meta_description');
        });
    }
};