@extends('layouts.main')


@section('title','Editando: '.$product->nome)

@section('content')
<div id="animal-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$product->nome}}</h1>
    <form action="/products/update/{{$product->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto..." value="{{$product->nome}}">
</div>
<div class="form-group">
    <label for="sku">SKU:</label>
    <input type="number" class="form-control" id="Sku" name="sku" placeholder="Codigo do Produto..." value="{{$product->sku}}" disabled>
</div>
<div class="form-group">
    <label for="qtd">Quantidade:</label>
    <input type="number" class="form-control" id="qtd" name="qtd" placeholder="Quantidade do Produto..." value="{{$product->qtd}}">
</div>
<div class="form-group">
    <label for="descricao">Descricao:</label>
    <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao do Produto...">{{$product->descricao}}</textarea>
</div>

<div class="form-group">
    <label for="foto">Foto:</label>
    <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Foto do Produto...">
    <img src="/img/products/{{$product->foto}}" alt="{{$product->nome}}" class="img-preview">
</div>
<div class="form-group">
<input type="submit" class="btn btn-warning" value="Cadastrar">
</div>
</form>
</div>
@endsection
