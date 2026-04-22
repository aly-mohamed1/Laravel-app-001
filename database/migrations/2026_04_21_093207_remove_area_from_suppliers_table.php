<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return list<string>
     */
    private function supplierColumns(): array
    {
        if (! Schema::hasTable('suppliers')) {
            return [];
        }

        return Schema::getColumnListing('suppliers');
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! in_array('area', $this->supplierColumns(), true)) {
            return;
        }

        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('suppliers') || in_array('area', $this->supplierColumns(), true)) {
            return;
        }

        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('area')->nullable();
        });
    }
};
