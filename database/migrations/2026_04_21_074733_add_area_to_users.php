<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Metadata\After;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('roles')->after('name');
            $table->string('mobile')->after('email_verified_at');
            $table->timestamp('created_at')->after('password');
            $table->timestamp('updated_at')->after('created_at');
            $table->timestamp('deleted_at')->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['roles', 'mobile', 'created_at', 'updated_at', 'deleted_at']);
        });
    }
};
