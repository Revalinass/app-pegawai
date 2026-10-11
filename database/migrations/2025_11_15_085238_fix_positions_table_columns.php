<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('positions', function (Blueprint $table) {
            // Rename nama_jabatan ke nama_posisi
            $table->renameColumn('nama_jabatan', 'nama_posisi');
        });
    }

    public function down()
    {
        Schema::table('positions', function (Blueprint $table) {
            $table->renameColumn('nama_posisi', 'nama_jabatan');
        });
    }
};