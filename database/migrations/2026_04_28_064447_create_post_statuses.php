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
        Schema::create('post_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->timestamps();
            $table->softDeletes();
            // 'timestamp('deleted_at')' it is not null which means you should delete something when I enter a data which is unlogic
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_statuses');
    }
};
