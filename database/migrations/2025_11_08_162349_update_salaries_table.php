<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            // Pastikan ada kolom employee_id
            if (!Schema::hasColumn('salaries', 'employee_id')) {
                $table->unsignedBigInteger('employee_id')->after('id');
            }
            
            // Pastikan ada kolom tunjangan
            if (!Schema::hasColumn('salaries', 'tunjangan')) {
                $table->integer('tunjangan')->default(0)->after('gaji_pokok');
            }
            
            // Pastikan ada kolom periode
            if (!Schema::hasColumn('salaries', 'periode')) {
                $table->string('periode', 255)->nullable()->after('total_gaji');
            }
        });
    }

    public function down(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            if (Schema::hasColumn('salaries', 'tunjangan')) {
                $table->dropColumn('tunjangan');
            }
            if (Schema::hasColumn('salaries', 'periode')) {
                $table->dropColumn('periode');
            }
        });
    }
};