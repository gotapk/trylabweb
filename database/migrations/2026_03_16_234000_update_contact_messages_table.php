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
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('phone')->after('email')->nullable();
            $table->string('form_type')->after('phone')->nullable();
            $table->json('services')->after('form_type')->nullable();
            $table->string('attachment_path')->after('services')->nullable();
            $table->string('diag_web')->after('attachment_path')->nullable();
            $table->string('diag_brand')->after('diag_web')->nullable();
            $table->string('diag_media')->after('diag_brand')->nullable();
            $table->string('diag_startup')->after('diag_media')->nullable();
            
            // Modify existing fields to be nullable
            $table->string('subject')->nullable()->change();
            $table->text('message')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 
                'form_type', 
                'services', 
                'attachment_path', 
                'diag_web', 
                'diag_brand', 
                'diag_media', 
                'diag_startup'
            ]);
            
            $table->string('subject')->nullable(false)->change();
            $table->text('message')->nullable(false)->change();
        });
    }
};
