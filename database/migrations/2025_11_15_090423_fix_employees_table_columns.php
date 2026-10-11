<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cleanup sudah dilakukan manual via tinker
        // Kolom duplikat (jabatan_id, posisi, department_id) sudah dihapus
        // Database sudah benar, tidak perlu action
    }

    public function down(): void
    {
        //
    }
};