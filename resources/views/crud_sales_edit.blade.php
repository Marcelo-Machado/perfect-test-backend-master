@extends('layout')

@section('content')
    <h1>Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="/salesUpdate">
            @csrf
            @method('PUT')
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <input value="{{$updateSale ->product}}" type="text" class="form-control" id="product" name="product">
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input value="{{$updateSale ->date_of_sale}}" type="text" class="form-control single_date_picker" id="date_of_sale" name="date_of_sale">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input value="{{$updateSale ->quantity_of_product}}" type="text" class="form-control" id="quantity_of_product" name="quantity_of_product" maxlength='2' min="0" max="10" placeholder="1 a 10">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input value="{{$updateSale ->discount}}" type="text" class="form-control" id="discount"  name="discount" min="0" max="100" maxlength='3' placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="value">Valor total</label>
                    <input value="{{$updateSale ->value}}" type="text" class="form-control" id="value"  name="value" min="0" max="100" maxlength='3' placeholder="100,00 ou menor">
                </div>
                <div class="form-group">
                    <label for="status">Status</label><br>                
                    <input type="radio" id="Aprovado" name="status_of_sale" value="Aprovado"> Aprovado&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="Cancelado" name="status_of_sale" value="Cancelado"> Cancelado&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="Devolvido" name="status_of_sale" value="Devolvido"> Devolvido
                </div>
                <input value='{{$updateSale ->id}}' id="id" name="id" readonly= "true" readonly style='visibility:hidden;'>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('{{$updateSale ->status_of_sale}}').checked = true;
    </script>
@endsection
