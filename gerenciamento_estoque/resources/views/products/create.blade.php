@extends('layouts.main')


@section('title','Create Product')

@section('content')
<div id="animal-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastro de Produtos</h1>
    <form action="/products" method="post" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Produto..." required>
</div>
<div class="form-group">
    <label for="idade">Sku:</label>
    <input type="number" class="form-control" id="sku" name="sku" placeholder="Codigo do Produto..." required>
</div>
<div class="form-group">
    <label for="qtd">Quantidade:</label>
    <input type="number" class="form-control" id="qtd" name="qtd" placeholder="Quantidade de Produto..." required>
</div>

<div class="form-group">
    <label for="descricao">Descricao Produto:</label>
    <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao do Produto..." required></textarea>
</div>

<div class="form-group">
    <label for="foto">Foto:</label>
    <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Foto do Animal..." required>
    <input type="hidden" class="form-control" id="status" name="status" value="0" >
</div>
<div class="form-group">
<input type="submit" class="btn btn-warning" value="Cadastrar">
</div>
</form>
</div>
@endsection
