<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->dateTime('uploaded_at')->nullable()->after('kembali');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->dropColumn('uploaded_at');
        });
    }
};
