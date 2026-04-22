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
            ['area', 'column2', 'column3'],
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
            if (! in_array('column1', $existingColumns, true)) {
                $table->string('column1')->nullable();
            }

            if (! in_array('column2', $existingColumns, true)) {
                $table->string('column2')->nullable();
            }

            if (! in_array('column3', $existingColumns, true)) {
                $table->string('column3')->nullable();
            }
        });
    }
};
