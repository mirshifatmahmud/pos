<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();

        return view('products.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $this->data['categoryList'] = Category::arrayForCatetoryList();
        $this->data['mode'] = 'create';
        $this->data['headLine'] = 'Add New Product';

        return view('products.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        Product::create($formData);

        return redirect()->to('product')->with('meg','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::find($id);

        return view('products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product'] = Product::find($id);
        $this->data['mode'] = 'edit';
        $this->data['categoryList'] = Category::arrayForCatetoryList();
        $this->data['headLine'] = 'Product Update';

        return view('products.form',$this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData = $request->all();
        $product = Product::find($id);
        $product->category_id = $formData['category_id'];
        $product->title = $formData['title'];
        $product->description = $formData['description'];
        $product->cost_price = $formData['cost_price'];
        $product->price = $formData['price'];

        $product->save();

        return redirect()->to('product')->with('meg','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->to('product')->with('meg','Product Deleted Successfully');
    }
}
