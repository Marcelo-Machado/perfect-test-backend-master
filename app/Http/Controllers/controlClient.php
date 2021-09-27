<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\Sale;
use Exception;

class controlClient extends Controller{

    public function index(){
        //
    }

    public function create(Request $request){
        $eventsClient = Client::all();
        $eventsProduct = Product::all();
        $eventsSale = Sale::all();
    
        //separa as datasdo $request
        $dateStart = (substr($request -> date_of_sale,0,10));
        $dateEnd = (substr($request -> date_of_sale,13,10));

        //verifica se o valor do select cliente foi selecionado
        if ($request -> idClient == "Clientes" or $request -> idClient == null)
            return redirect('/');

        //busca o registro do cliente selecionado no bd
        $checkClient = Client::where('id', $request -> idClient)->get(['id','cpf','name']);
        $checkSale = Sale::where('cpf', $checkClient[0] -> cpf)->get(['id','product','date_of_sale','discount','value'])->whereBetween('date_of_sale', [$dateStart, $dateEnd]);// resgata as vendas do cliente pelo cpf entre as datas selecionadas
        // seleciona os campos necessários 
        $selectColumnSale = $eventsSale->where('quantity_of_product')->where('value')->where('status_of_sale');  

        try { 
        //agrupa a coluna pelo status
        $quantityTotal = $selectColumnSale->groupBy('status_of_sale', 'Aprovado')->groupBy('status_of_sale', 'Devolvido')->groupBy('status_of_sale', 'Cancelado');  
            // verifica a quantidade de cada status
            $quantityApproved = count($quantityTotal['']['']["Aprovado"]);
            $quantityReturned = count($quantityTotal['']['']["Devolvido"]);
            $quantityCanceled = count($quantityTotal['']['']["Cancelado"]); 

            //soma os valores de vendas de cada status
            $valueTotalApproved = $selectColumnSale->where('status_of_sale', 'Aprovado')->sum('value'); 
            $valueTotalReturned = $selectColumnSale->where('status_of_sale', 'Devolvido')->sum('value'); 
            $valueTotalCanceled = $selectColumnSale->where('status_of_sale', 'Cancelado')->sum('value'); 

        return view('dashboard')->with('eventsClient',$eventsClient)->with('eventsProduct',$eventsProduct)->with('eventsSale',$eventsSale)
        ->with('quantityApproved',$quantityApproved)->with('quantityReturned',$quantityReturned)->with('quantityCanceled',$quantityCanceled)
        ->with('valueTotalApproved',$valueTotalApproved)->with('valueTotalReturned',$valueTotalReturned)->with('valueTotalCanceled',$valueTotalCanceled)
        ->with('checkSale',$checkSale)->with('checkClient',$checkClient)->with('dateSearch',$request -> date_of_sale);    
    }catch (Exception $e) {	
        return view('dashboard')->with('eventsClient',$eventsClient)->with('eventsProduct',$eventsProduct)->with('eventsSale',$eventsSale)
        ->with('checkSale',$checkSale)->with('checkClient',$checkClient)->with('dateSearch',$request -> date_of_sale);  
    }
    }

    public function store(Request $request){
        $eventClient = new Client;

        //verifica se o cpf existe
        $checkCpf = $eventClient->where('cpf',$request -> cpf)->first();
        //se o cpf existir, exibe uma mensagem
        if($checkCpf != null)
            dd('Cpf já existe');

            //cadastra um novo cliente
            $eventClient -> name = $request -> name;
            $eventClient -> email = $request -> email;
            $eventClient -> cpf = $request -> cpf;
            $eventClient -> save();
        return redirect('/');
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
