@extends('layouts.main')


@section('title','Relatorios')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Relatorio Geral</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
<h4>Lista de Entradas</h4>
</div>
<div class="col-md-10 offset-md-1 dashboard-animals-container">
    @if(count($relatorios) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo do Produto</th>
                <th scope="col">QTD</th>
                <th scope="col">SKU</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
            @if($relatorio->tipo_relatorio == 1)
            <tr>
                <!-- <th scropt='row'>{{$loop->index+1}}</th> -->
                <td><a>{{$relatorio->nome}}</a></td>
                <td>{{$relatorio->qtd}}</td>
                <td>{{$relatorio->sku}}</td>
                <td>{{$relatorio->created_at}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não Existe Relatorios gerados,</p><a href="/">Voltar para Home</a>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
<h4>Lista de Saída</h4>
</div>
<div class="col-md-10 offset-md-1 dashboard-animals-container">
    @if(count($relatorios) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo do Produto</th>
                <th scope="col">QTD</th>
                <th scope="col">SKU</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
            @if($relatorio->tipo_relatorio == 2)
            <tr>
                <!-- <th scropt='row'>{{$loop->index+1}}</th> -->
                <td><a>{{$relatorio->nome}}</a></td>
                <td>{{$relatorio->qtd}}</td>
                <td>{{$relatorio->sku}}</td>
                <td>{{$relatorio->created_at}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não Existe Relatorios gerados,</p><a href="/">Voltar para Home</a>
    @endif
</div>
@endsection
