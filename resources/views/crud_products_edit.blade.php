@extends('layout')

@section('content')
    <h1>Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="/productUpdate">
            @csrf
            @method('PUT')
                <div class="form-group">         
                    <label for="name">Nome do produto</label>
                    <input value='{{$updateProduct ->name}}' type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description" name="description">{{$updateProduct ->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input value='{{$updateProduct ->price}}' type="text" class="form-control" id="price" placeholder="100,00 ou maior" name="price">
                </div>
                <input value='{{$updateProduct ->id}}' id="id" name="id" readonly= "true" readonly style='visibility:hidden;'>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
@endsection


