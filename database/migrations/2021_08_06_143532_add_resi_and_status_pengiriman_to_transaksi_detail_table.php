<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResiAndStatusPengirimanToTransaksiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_detail', function (Blueprint $table) {
           $table->string('status_pengiriman');//pending/shipping/succes
            $table->string('resi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_detail', function (Blueprint $table) {
            $table->dropColumn('status_pengiriman');
            $table->dropColumn('resi');
        });
    }
}
