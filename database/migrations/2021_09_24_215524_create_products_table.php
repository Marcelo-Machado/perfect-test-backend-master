<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration{

    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->unique();
            $table->text('description');
            $table->decimal('price');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    public function down(){
        Schema::dropIfExists('products');
    }
}
