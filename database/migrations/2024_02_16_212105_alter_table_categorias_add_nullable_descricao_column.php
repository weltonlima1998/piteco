<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCategoriasAddNullableDescricaoColumn extends Migration
{
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->string('descricao')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->string('descricao')->change();
        });
    }
}
