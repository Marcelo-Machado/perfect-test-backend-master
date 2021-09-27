<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration{

    public function up(){
        Schema::create('sales', function (Blueprint $table) {
            $table->id();            
            //campo de relacionamento
            $table->integer('id_products')->unsigned();
            $table->string('cpf',11);
            $table->string('product',150);
            $table->string('date_of_sale');
            $table->integer('quantity_of_product');
            $table->decimal('discount');
            $table->decimal('value');
            $table->string('status_of_sale');
            $table->timestamps();
            $table->softDeletes()->nullable();  
            //relacionamento          
            $table->foreign('id_products')->references('id_products')->on('products');
        });
    }

    public function down(){
        Schema::dropIfExists('sales');
    }
}
