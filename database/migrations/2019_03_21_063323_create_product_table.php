<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
			$table->primary('id_product');
			$table->string('id_product',20);
			$table->string('id_kategori',10);
            $table->integer('id_user');
            $table->string('nama_product');
            $table->double('harga');
            $table->longText('deskripsi');
			$table->string('status');
			$table->longText('img')->nullable;
			$table->integer('views')->nullable();
			$table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
