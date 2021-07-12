@extends('layouts.main')


@section('title','Gerenciamento de Estoque')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque pelo nome do Produto</h1>
    <form action="/" method="GET">
        <div style="display: flex;">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar nome...">
            <input type="submit" class="btn btn-warning" value="Pesquisar">
        </div>
    </form>
</div>
<div id="animals-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Todos os Produtos</h2>
    <p class="subtitle">Lista de Todos os Produtos Cadastrados</p>
    @endif

    <div id="cards-container" class="row">
        @foreach($products as $product)
        <div class="card col-md-3">
            <img src="/img/products/{{$product->foto}}" alt="{{$product->nome}}">
            <div class="card-body">
        
                <h5 class="card-title">{{$product->nome}}</h5>
       
                <a href="/products/{{$product->id}}" class="btn btn-success">Detalhes</a>
        
            </div>
        </div>
        @endforeach
        @if(count($products) == 0 && $search )
        <p>Não foi possível econtrar nenhum produto com {{$search}}!</p> <a href="/">Ver Todos Produtos</a>
        @elseif(count($products) == 0)
        <p>Não há Produtos Cadastrados</p>
        @endif
     <div class="pagination">
        {{$products->links()}}
    </div>
    
</div>
@endsection