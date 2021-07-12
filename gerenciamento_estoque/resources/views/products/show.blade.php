@extends('layouts.main')


@section('title',$product->nome)

@section('content')
<div class="col-md-10 offset-md-1">
<div class="row">
<div id="image-container" class="col-md-6">
<img src="/img/products/{{$product->foto}}" class="img-fluid" alt="{{$product->nome}}">
</div>
<div id="info-container" class="col-md-6">
<h1>{{$product->nome}}</h1>
<p class="animal-city"><ion-icon name="flag-outline"></ion-icon> SKU: {{$product->sku}}</p>
<p class="animal-owner"><ion-icon name="person-circle-outline"></ion-icon>Anunciante: {{$productOwner['name']}}</p>

<p class="animal-owner"><ion-icon name="layers-outline"></ion-icon>Quantidade Total: {{$product->qtd}} Produto(s)</p>

@auth

<h3>Deseja dar baixa neste produto?</h3>
<form action="/products/baixar/{{$product->id}}" method="post">
@csrf
@method('PUT')
<input type="hidden" value="{{$product->id}}">
<input type="number" name="baixar" id="baixar" class="control-form" placeholder="Infomar Quantidade..."> <br>
<br>
<button type="submit" class="btn btn-warning">Confirmar</button>
</form>
</div>
@endauth
<div class="col-md-12" id="informacoes_extra-container">
<h3>Informações sobre o produto:</h3>
<p class="animal-informacoes_extra">{{$product->descricao}}</p>
</div>
</div>
</div>
@endsection