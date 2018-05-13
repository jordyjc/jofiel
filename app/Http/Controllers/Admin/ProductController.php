<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\SaveProductRequest;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        //dd($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        //dd($categories);
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name')),
            'description' => $request->get('description'),
            'extract' => $request->get('extract'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
            'stock' => $request->get('stock'),
            'visible' => $request->has('visible') ? 1 : 0,
            'category_id' => $request->get('category_id')
        ];

        $product = Product::create($data);

        $message = $product ? 'Producto agregado correctamente' : 'El producto NO pudo agregarse';

        return redirect()->route('product.index')->with('message', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');

        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product ->fill($request->all());

        $product->slug = str_slug($request->get('name'));

        $product->visible = $request->has('visible' ) ? 1 : 0;

        $updated = $product->save();

        $message = $updated ? 'Producto actualizado correctamente' : 'El producto NO pudo actualizarse';

        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();

        $message = $deleted ? 'Producto eliminado correctamente' : 'El producto NO pudo eliminarse';

        return redirect()->route('product.index')->with('message', $message);
    }
}
