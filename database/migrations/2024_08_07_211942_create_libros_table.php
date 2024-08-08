<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('genero');
            $table->date('fecha_publicacion');
            $table->string('imagen')->nullable();
            $table->text('sinopsis')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropColumn('imagen');
            $table->dropColumn('sinopsis');
        });
    }
}
