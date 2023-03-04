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
            $table->unsignedBigInteger('murid_id')->after('id');
            $table->foreign('murid_id')->references('id')->on('murid')->onDelete('cascade');
            $table->unsignedBigInteger('piket_id')->after('status');
            $table->foreign('piket_id')->references('id')->on('piket')->onDelete('cascade');
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
            $table->dropForeign(['murid_id']);
            $table->dropForeign(['piket_id']);
        });
    }
};
