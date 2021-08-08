<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableFieldAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('alamat_1')->nullable()->change();
            $table->longText('alamat_2')->nullable()->change();
            $table->integer('provinces_id')->nullable()->change();
            $table->integer('regencies_id')->nullable()->change();
            $table->integer('kode_pos')->nullable()->change();
            $table->string('negara')->nullable()->change();
             $table->string('no_hp')->nullable()->change();
              $table->string('nama_toko')->nullable()->change();
             $table->integer('kategori_id')->nullable()->change();
              $table->integer('status_toko')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
              $table->longText('alamat_1')->nullable(false)->change();
            $table->longText('alamat_2')->nullable(false)->change();
            $table->integer('provinces_id')->nullable(false)->change();
            $table->integer('regencies_id')->nullable(false)->change();
            $table->integer('kode_pos')->nullable(false)->change();
            $table->string('negara')->nullable(false)->change();
             $table->string('no_hp')->nullable(false)->change();
              $table->string('nama_toko')->nullable(false)->change();
             $table->integer('kategori_id')->nullable(false)->change();
              $table->integer('status_toko')->nullable(false)->change();
        });
    }
}
