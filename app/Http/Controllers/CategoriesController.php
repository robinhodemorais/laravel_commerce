<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class CategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel){
        $this->categoryModel = $categoryModel;
    }

    public function index(){
        $categories = $this->categoryModel->paginate(5);
        return view('categories.index', compact('categories'));
    }

    public function  create(){
        return view('categories.create');
    }

    /*armazena os dados enviado para o bd*/
    public function store(Requests\CategoryRequest $request){
       $input = $request->all();
        //preenche os dados do categoryModel no input
       $category = $this->categoryModel->fill($input);
        //salva os dados no banco de dados
        $category->save();

        //após salvar, redireciona para a pagina categories e lista
        return redirect()->route('categories');

    }

    public function destroy($id){
        $this->categoryModel->find($id)->delete();
        return redirect()->route('categories');
    }

    /*Action responsavel para fazer a alteração*/
    public function update(Requests\CategoryRequest $request, $id)
    {
        //pega o registro de acordo com o id e dá um update
        $this->categoryModel->find($id)->update($request->all());

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        //pega o registro que quer editar
        $category = $this->categoryModel->find($id);
        //passa a $category pelo compact para a view edit
        return view('categories.edit', compact('category'));
    }
}
