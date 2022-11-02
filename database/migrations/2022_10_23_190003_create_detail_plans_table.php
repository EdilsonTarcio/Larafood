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
        Schema::create('detail_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('plan_id') //nome da coluna dessa tabela que vai ser a chave estranjeira
                    ->references('id')  // nome da coluna de referencia da tabela de plano
                    ->on('plans') //nome da tabela
                    ->onDelete('cascade'); //quando deletar um plano deleta os detalhes também
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_plans');
    }
};
