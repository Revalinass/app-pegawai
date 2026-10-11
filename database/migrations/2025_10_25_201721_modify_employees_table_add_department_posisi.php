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
        Schema::table('employees', function (Blueprint $table) {
            // Hapus jenis_kelamin jika kolomnya ada
            if (Schema::hasColumn('employees', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }

            // Tambah department_id (nullable + foreign key)
            if (!Schema::hasColumn('employees', 'department_id')) {
                $table->foreignId('department_id')
                      ->nullable()
                      ->constrained('departments')
                      ->onDelete('set null')
                      ->after('alamat');
            }

            // Tambah posisi
            if (!Schema::hasColumn('employees', 'posisi')) {
                $table->string('posisi', 100)->nullable()->after('department_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {

            // Hapus foreign + kolom department_id & posisi
            if (Schema::hasColumn('employees', 'department_id')) {
                $table->dropForeign(['department_id']);
                $table->dropColumn('department_id');
            }

            if (Schema::hasColumn('employees', 'posisi')) {
                $table->dropColumn('posisi');
            }

            // Tambahkan kembali jenis_kelamin (jika ingin restore saat rollback)
            if (!Schema::hasColumn('employees', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('alamat');
            }
        });
    }
};
