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
        $columnsToDrop = array_values(array_intersect(
            ['area', 'added_by', 'deleted_at', 'created_at', 'updateded_at'],
            $this->supplierColumns(),
        ));

        if ($columnsToDrop === []) {
            return;
        }

        Schema::table('suppliers', function (Blueprint $table) use ($columnsToDrop) {
            $table->dropColumn($columnsToDrop);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('suppliers')) {
            return;
        }

        $existingColumns = $this->supplierColumns();

        Schema::table('suppliers', function (Blueprint $table) use ($existingColumns) {
            if (! in_array('area', $existingColumns, true)) {
                $table->string('area', 100)->nullable();
            }

            if (! in_array('added_by', $existingColumns, true)) {
                $table->foreignId('added_by')->nullable();
            }

            if (! in_array('deleted_at', $existingColumns, true)) {
                $table->softDeletes('deleted_at');
            }

            if (! in_array('created_at', $existingColumns, true)) {
                $table->timestamp('created_at')->nullable();
            }

            if (! in_array('updateded_at', $existingColumns, true)) {
                $table->timestamp('updateded_at')->nullable();
            }
        });
    }
};
