<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration{

    public function up(){
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('email',250);
            //campo de relacionamento
            $table->string('cpf',11)->unique(); 
            $table->timestamps();
            $table->softDeletes()->nullable();
            //campo de relacionamento
            $table->foreign('cpf')->references('cpf')->on('sales')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('clients');
    }
}
