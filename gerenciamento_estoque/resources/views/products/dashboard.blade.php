@extends('layouts.main')


@section('title','Meus Produtos')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Produtos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-animals-container">
    @if(count($products) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">QTD</th>
                <th scope="col">SKU</th>
                <th scope="col">Ações</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <!-- <th scropt='row'>{{$loop->index+1}}</th> -->
                <td><a href="/products/{{$product->id}}">{{$product->nome}}</a></td>
                <td>{{$product->qtd}}</td>
                <td>{{$product->sku}}</td>
                <td><a href="/products/edit/{{$product->id}}" class="btn btn-info edit-btn"> <ion-icon name="create-outline"></ion-icon> Editar</a>
               <form action="/products/{{$product->id}}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Excluir</button>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você não tem Produtos Cadastrados,</p><a href="/products/create">Cadastrar Produtos</a>
    @endif
</div>
@endsection