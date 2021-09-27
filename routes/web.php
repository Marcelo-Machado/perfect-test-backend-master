<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\Sale;
use App\Http\Controllers\controlClient;
use App\Http\Controllers\controlProducts;
use App\Http\Controllers\controlSales;

//rota inicial que preenche o dashboard
Route::get('/', function () {
    $eventsClient = Client::all();
    $eventsProduct = Product::all(); 
    $eventsSale = Sale::all();
 
    //seleciona os campos necessarios da tabelas Cliente
    $selectColumnSale = $eventsSale->where('quantity_of_product')->where('value')->where('status_of_sale'); 

        //agrupa a coluna pelo status
        $quantityTotal = $selectColumnSale->groupBy('status_of_sale','Aprovado')->groupBy('status_of_sale','Devolvido')->groupBy('status_of_sale','Cancelado');  

        try { 
            //verifica a quantidade de cada status
            $quantityApproved = count($quantityTotal['']['']["Aprovado"]);             
            $quantityReturned = count($quantityTotal['']['']["Devolvido"]);
            $quantityCanceled = count($quantityTotal['']['']["Cancelado"]); 

            //soma os valores(preço) por status
            $valueTotalApproved = $selectColumnSale->where('status_of_sale', 'Aprovado')->sum('value'); 
            $valueTotalReturned = $selectColumnSale->where('status_of_sale', 'Devolvido')->sum('value'); 
            $valueTotalCanceled = $selectColumnSale->where('status_of_sale', 'Cancelado')->sum('value'); 
   
        return view('dashboard')->with('eventsClient',$eventsClient)->with('eventsProduct',$eventsProduct)->with('eventsSale',$eventsSale)
                                ->with('quantityApproved',$quantityApproved)->with('quantityReturned',$quantityReturned)->with('quantityCanceled',$quantityCanceled)
                                ->with('valueTotalApproved',$valueTotalApproved)->with('valueTotalReturned',$valueTotalReturned)->with('valueTotalCanceled',$valueTotalCanceled);
        }catch (Exception $e) {	
            return view('dashboard')->with('eventsClient',$eventsClient)->with('eventsProduct',$eventsProduct)->with('eventsSale',$eventsSale);

        }

});

//exibe o formulario para cadastrar novo cliente
Route::get('/clientRegistration', function () {
    return view('crud_client');
});

//direciona para o controle que exibe as vendas do cliente no dashboard
Route::post('/client', [controlClient::class, 'create']);

//direciona para o controle que salva o cadastro de novos clientes
Route::post('/clientSave', [controlClient::class, 'store']);

//exibe o formulario de vendas e preenche com produtos existentes 
Route::get('/sales', function () {
    $eventsProduct = Product::all();
    return view('crud_sales',['eventsProduct' =>$eventsProduct]); 
});

//direciona para o controle que salva as vendas
Route::post('/salesSave', [controlSales::class, 'store']);

//direciona para o controle que resgata as informações para edição da venda
Route::get('/salesEdit/{id}', [controlSales::class, 'edit']);

//direciona para controle que atualiza as informações da venda
Route::put('/salesUpdate', [controlSales::class, 'update']);

//exibe o formulario de cadstro de novos produtos
Route::get('/products', function () {
    return view('crud_products');
});

//direciona para o controle que salva o cadastro de novos produtos
Route::post('/productsSave', [controlProducts::class, 'store']);

//direciona para o controle que resgata as informações para edição do produto
Route::get('/productsEdit/{id}', [controlProducts::class, 'edit']);

//direciona para controle que atualiza as informações do produto
Route::put('/productUpdate', [controlProducts::class, 'update']);