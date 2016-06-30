<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct (Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->all();
        return view('products.index', compact('products'));
    }

    public function  create(){
        return view('products.create');
    }

    /*armazena os dados enviado para o bd*/
    public function store(Requests\ProductRequest $request){
        $input = $request->all();
        //preenche os dados do categoryModel no input
        $product = $this->productModel->fill($input);
        //salva os dados no banco de dados
        $product->save();

        //após salvar, redireciona para a pagina categories e lista
        return redirect()->route('products');

    }

    public function destroy($id){
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

    /*Action responsavel para fazer a alteração*/
    public function update(Requests\ProductRequest $request, $id)
    {
        //pega o registro de acordo com o id e dá um update
        $this->productModel->find($id)->update($request->all());

        return redirect()->route('products');
    }

    public function edit($id)
    {
        //pega o registro que quer editar
        $product = $this->productModel->find($id);
        //passa a $category pelo compact para a view edit
        return view('products.edit', compact('product'));
    }


}
