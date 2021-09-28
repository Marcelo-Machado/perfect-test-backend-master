@extends('layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas            
            <a href='/sales' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a>
            <a href='/clientRegistration' class='btn btn-secondary float-right btn-sm rounded-pill' style='margin-right:10px;'><i class='fa fa-plus'></i>  Novo Cliente</a></h5>

            <form method="POST" action="/client">
            @csrf
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName" name='idClient'>
                                <option>Clientes</option>
                                @if (isset($eventsClient))
                                    @foreach ($eventsClient as $eventsClient)
                                        <option value='{{$eventsClient ->id}}'>{{$eventsClient ->name}}</option>
                                    @endforeach
                                @endif

                                @if (isset($checkSale))                                
                                    <option value="{{$checkClient[0] ->id}}" selected>{{$checkClient[0] ->name}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            @if (isset($dateSearch))                                
                                <input value='{{$dateSearch}}' type="text" class="form-control date_range" id="date_of_sale" name="date_of_sale" placeholder="Username">
                            @else
                                <input type="text" class="form-control date_range" id="date_of_sale" name="date_of_sale" placeholder="Username">
                            @endif
                            </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>

            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @if (isset($checkSale))
                @foreach ($checkSale as $checkSale)
                <tr>
                    <td>                        
                        {{$checkSale ->product}}                        
                    </td>
                    <td>
                        {{$checkSale ->date_of_sale}}  
                    </td>
                    <td>
                        R$ {{$checkSale ->value}}  
                    </td>
                    <td>
                        <a href='/salesEdit/{{$checkSale ->id}}' class='btn btn-primary'>Editar</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                <tr>
                    <td>
                        Vendidos
                    </td>
                    <td>
                        @if (isset($quantityApproved))
                            {{$quantityApproved}}  
                        @endif
                    </td>
                    <td>
                        @if (isset($valueTotalApproved))
                            R$ {{$valueTotalApproved}}  
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Cancelados
                    </td>
                    <td>
                        @if (isset($quantityCanceled))
                            {{$quantityCanceled}}  
                        @endif
                    </td>
                    <td>
                        @if (isset($valueTotalCanceled))
                            R$ {{$valueTotalCanceled}}  
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Devoluções
                    </td>
                    <td>
                    @if (isset($quantityReturned))
                        {{$quantityReturned}}  
                    @endif
                    </td>
                    <td>
                        @if (isset($valueTotalReturned))
                            R$ {{$valueTotalReturned}}  
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='/products' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @if (isset($eventsProduct))
                @foreach ($eventsProduct as $eventsProduct)
                <tr>
                    <td>                        
                        {{$eventsProduct ->name}}                        
                    </td>
                    <td>
                        R$ {{$eventsProduct ->price}}  
                    </td>
                    <td>
                        <a href='/productsEdit/{{$eventsProduct ->id}}' class='btn btn-primary'>Editar</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
