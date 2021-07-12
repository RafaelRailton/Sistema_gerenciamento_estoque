<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Relatorio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {

            $products = Product::where([
                ['nome', 'like', '%' . $search . '%']
            ])->simplePaginate(8);
        } else {
            $products =  DB::table('products')->simplePaginate(8);
        }

        return view('welcome', ['products' => $products, 'search' => $search]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $relatorio = new Relatorio();
        $product->nome   = $request->name;
        $product->sku  = $request->sku;
        $product->descricao = $request->descricao;
        $product->foto   = $request->foto;
        $product->qtd = $request->qtd;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage   = $request->foto;
            $extension      = $requestImage->extension();
            $fotoName       = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/products'), $fotoName);
            $product->foto   = $fotoName;
        }
        $user            = auth()->user();
        $product->user_id = $user->id;
        $data =  DB::table('products')->get();
        
        if(count($data) == 0){
            $product->save();
            $datatwo =  DB::table('products')->get();
            $count = count($datatwo);
            $relatorio->nome = $datatwo[$count-1]->nome;
            $relatorio->sku = $datatwo[$count-1]->sku;
            $relatorio->descricao = $datatwo[$count-1]->descricao;
            $relatorio->qtd = $datatwo[$count-1]->qtd;
            $relatorio->tipo_relatorio = 1;
            $relatorio->user_id = $user->id; 
            $relatorio->save();
            return redirect('/')->with('msg', 'Produto Cadastrado com Sucesso!');
        }else{
            foreach($data as $auth_sku){
                if($auth_sku->sku == $product->sku){
                    return redirect('/products/create')->with('msg', 'Ops! já existe um produto Cadastrado com esse SkU.');
                }
            }
            $product->save();
            $datatwo =  DB::table('products')->get();
            $count = count($datatwo);
            $relatorio->nome = $datatwo[$count-1]->nome;
            $relatorio->sku = $datatwo[$count-1]->sku;
            $relatorio->descricao = $datatwo[$count-1]->descricao;
            $relatorio->qtd = $datatwo[$count-1]->qtd;
            $relatorio->tipo_relatorio = 1;
            $relatorio->user_id = $user->id; 
            $relatorio->save();
            return redirect('/')->with('msg', 'Produto Cadastrado com Sucesso!');
        }
       
       
    }
    public function show($id)
    {
        $product      =  Product::findOrFail($id);
        $productOwner =  User::where('id', $product->user_id)->first()->toArray();
        return view('products.show', ['product' => $product, 'productOwner' => $productOwner]);
    }
    public function myproducts(){
         $user       = auth()->user();
         $products    = $user->products;
        return view('products.dashboard',['products'=>$products]);
    }
    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg','Produto Excluído com Sucesso!');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request){
            $relatorio = new Relatorio();
            $data = $request->all();
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage   = $request->foto;
            $extension      = $requestImage->extension();
            $fotoName       = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/products'), $fotoName);
            $data['foto']   = $fotoName;
        }
       
            Product::findOrFail($request->id)->update($data);
            $product = DB::table('products')->where('id', $request->id)->first();
            $relatorio->nome = $product->nome;
            $relatorio->sku =  $product->sku;
            $relatorio->descricao = $product->descricao;
            $relatorio->qtd = $product->qtd;
            $relatorio->tipo_relatorio = 1;
            $relatorio->user_id = $product->user_id;
            $relatorio->save();
        return redirect('/dashboard')->with('msg','Dados Editados com Sucesso!');
    }

    public function baixar($id,Request $request){
      
        $baixar   = $request->baixar;
        $product = DB::table('products')->where('id', $id)->first();
     
        if(!($baixar > $product->qtd)){
          
            $result = $product->qtd - $baixar;
            Product::where('id',$request->id)->update(['qtd'=> $result]);
            $product = DB::table('products')->where('id', $id)->first();
             $relatorio = new Relatorio();
             $relatorio->nome = $product->nome;
             $relatorio->sku =  $product->sku;
             $relatorio->descricao = $product->descricao;
             $relatorio->qtd = $baixar;
             $relatorio->tipo_relatorio = 2;
             $relatorio->user_id = $product->user_id;
             $relatorio->save();
            if($product->qtd < 100){
                return redirect('/products/'.$id)->with('msg','Enviado para Cliente com Sucesso! "ESTOQUE BAIXO"');
            }else{
                return redirect('/products/'.$id)->with('msg','Enviado para Cliente com Sucesso!');
            }
        }else{
            return redirect('/products/'.$id)->with('msg','Quantidade Invalida!');
        }
        
    }
    public function relatorios(){
        $user       = auth()->user();
        $data    = $user->relatorios;
       return view('relatorios',['relatorios'=>$data]);
    }

  
}
