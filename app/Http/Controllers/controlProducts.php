<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\Sale;

class controlProducts extends Controller{

    public function index(){
        //
    }

    public function create(){
        //
    }

    //salva o cadastro do produto
    public function store(Request $request){
        $eventProduct = new Product;
            $eventProduct -> name = $request -> name;
            $eventProduct -> description = $request -> description;
            $eventProduct -> price = $request -> price;
            $eventProduct -> save();
        return redirect('/');
    }

    public function show($id){
        //
    }

    //resgata o cadastro do produto para atualizar
    public function edit($id){
        $updateProduct = Product::findOrFail($id);
        return view('/crud_products_edit',['updateProduct' =>$updateProduct]);
    }

    //atualiza o cadastro do produto
    public function update(Request $request){
        Product::findOrFail($request->id)->update($request->all());
        return redirect('/');   
    }

    public function destroy($id){
        //
    }
}
