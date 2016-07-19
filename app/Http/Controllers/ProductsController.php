<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use CodeCommerce\Http\Requests;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct (Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        //paginate > informa de quanto em quanto registro
        //cria paginas de listagem dos produtos
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }

    //declarando a Category na function, o laravel automaticamente
    //instancia a Category nessa function, chamado Method Injection
    public function  create(Category $category){
        //lista todas as categorias
        //o metodo lists permite informar quais campos irá trazer da tabela
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));
    }

    /*armazena os dados enviado para o bd*/
    public function store(Requests\ProductRequest $request){
       /* $input = $request->all();

        $input['featured'] = $request->get('featured') ? true : false;
        $input['recommend'] = $request->get('recommend') ? true : false;

        $arrayTags = $this->tagToArray($input['tags']);

        //preenche os dados do categoryModel no input
        $product = $this->productModel->fill($input);
        //salva os dados no banco de dados
        $product->save();

        //após salvar, redireciona para a pagina categories e lista
        return redirect()->route('products');*/
        $product = $this->productModel->fill($request->all());
        $product->save();
        $inputTags = array_map('trim', explode(',', $request->get('tags')));
        $this->storeTag($inputTags,$product->id);

    }

    public function destroy($id){
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

    /*Action responsavel para fazer a alteração*/
    public function update(Requests\ProductRequest $request, $id)
    {
        //pega o registro de acordo com o id e dá um update
        //$this->productModel->find($id)->update($request->all());

       /* $input = $request->all();
        $input['featured'] = $request->get('featured') ? true : false;
        $input['recommend'] = $request->get('recommend') ? true : false;
        $arrayTags = $this->tagToArray($input['tags']);
        $this->productModel->find($id)->update($input);
        $product = Product::find($id);
        $product->tags()->sync($arrayTags);*/

        $this->productModel->findOrNew($id)->update($request->all());
        $input = array_map('trim', explode(',', $request->get('tags')));
        $this->storeTag($input,$id);

        return redirect()->route('products');
    }

    public function edit($id, Category $category)
    {
       /* //pega o registro que quer editar
        $product = $this->productModel->find($id);

        $product->tags = $product->tag_list;

      //  dd($product->tags);

        //lista todas as categorias
        //o metodo lists permite informar quais campos irá trazer da tabela
        $categories = $category->lists('name','id');

       // dd($categories);*/

        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);

        //passa a $category pelo compact para a view edit
        return view('products.edit', compact('product','categories'));

    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));

        //return view('products.images');
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        //pega o arquivo
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }
        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images',['id'=>$product->id]);

    }


    private function storeTag($inputTags, $id)
    {
        $tag = new Tag();
        foreach ($inputTags as $key => $value) {
            $newTag = $tag->firstOrCreate(["name" => $value]);
            $idTags[] = $newTag->id;
        }
        $product = $this->productModel->find($id);
        $product->tags()->sync($idTags);


    }

    private function tagToArray($tags)
    {
        $tags = explode(",", $tags);
        $tags = array_map('trim', $tags);
        $tagCollection = [];
        foreach ($tags as $tag) {
            $t = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagCollection, $t->id);
        }
        return $tagCollection;
    }


}
