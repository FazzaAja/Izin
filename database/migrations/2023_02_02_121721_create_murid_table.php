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
        Schema::create('murid', function (Blueprint $table) {
            $table->id('nis', 10)->unique();
            $table->string('foto', 100)->nullable();
            $table->string('nama', 50);
            $table->string('kelas', 3);
            // $table->foreign('jurusan_id')->constrained('jurusan')->onDelete('cascade');
            $table->string('alamat', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('murid');
    }
};
