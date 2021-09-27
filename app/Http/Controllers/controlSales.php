<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\Sale;

class controlSales extends Controller{

    public function index(){
        //
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $eventSale = new Sale; 
        $eventClient = new Client;

        $checkQuantity = $request -> quantity;
        //verifica se a quantidade é maior que 10
        if($checkQuantity > 10)
            dd('Quantidade maior que 10');

        $checkDiscount = $request -> discount;
        //verifica se o desconto é maior que 100
        if($checkDiscount > 100)
            dd('Desconto maior que 100');

        //busca o nome e preço do produto
        $checkProduct = Product::where('id', $request -> idproduct)->get(['name','price']); 
        //verifica se o cpf existe
        $checkCpf = Client::where('cpf',$request -> cpf)->first();

            //salva o cadastro da venda
            $eventSale -> product = $checkProduct[0] -> name;
            $eventSale -> value = ($checkProduct[0] -> price * $request -> quantity) - $request -> discount;
            $eventSale -> id_products = $request -> idproduct;
            $eventSale -> date_of_sale = $request -> date;
            $eventSale -> quantity_of_product = $request -> quantity;
            $eventSale -> discount = $request -> discount;
            $eventSale -> status_of_sale = $request -> status;
            $eventSale -> cpf = $request -> cpf;
            $eventSale -> created_at = $request -> created_at;
            $eventSale -> save();
        
        //se o cpf não existir, insere um novo cliente
        if($checkCpf == null){
            $eventClient -> name = $request -> name;
            $eventClient -> email = $request -> email;
            $eventClient -> cpf = $request -> cpf;
            $eventClient -> save();
        }
            return redirect('/');
    }

    public function show($id){
        //
    }

    //resgata o cadastro da venda escolhida
    public function edit($id){
        $updateSale = Sale::findOrFail($id);
        return view('/crud_sales_edit',['updateSale' =>$updateSale]);
    }

    //atualiza o cadastro de vendas
    public function update(Request $request){
        Sale::findOrFail($request->id)->update($request->all());
        return redirect('/');   
    }

    public function destroy($id){
        //
    }
}
