<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangTable extends Migration
{
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah_produk');
            $table->decimal('sub_total', 10, 2);
            $table->timestamps();

            // Definisi kunci asing
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');

            // Tambahan kolom 'create_at' dan 'modified_at'
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('modified_at')->default(now())->nullable();

            // Anda juga dapat menambahkan kolom lain sesuai kebutuhan
        });
    }

    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}
