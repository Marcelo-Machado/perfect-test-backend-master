@extends('layout')

@section('content')
    <h1>Adicionar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="/salesSave">
            @csrf
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength= '11' placeholder="99999999999">
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select id="idproduct" name="idproduct" class="form-control">
                        <option disabled selected>Escolha...</option>
                    @foreach ($eventsProduct as $eventsProduct)                
                        <option value="{{$eventsProduct ->id}}">{{$eventsProduct ->name}}</option>                      
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="text" class="form-control single_date_picker" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" maxlength='2' min="0" max="10" placeholder="1 a 10">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input type="text" class="form-control" id="discount"  name="discount" min="0" max="100" maxlength='3' placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status"  name="status"class="form-control">
                        <option selected>Escolha...</option>
                        <option>Aprovado</option>
                        <option>Cancelado</option>
                        <option>Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
