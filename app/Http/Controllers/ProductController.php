<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('pages.product.index',compact('products'));
    }

    public function create()
    {
        return view('pages.product.create');
    }

    public function store(Request $request)
    {
        //($request->all());
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $newProduct = Product::create($data);
        Alert::success('Successfully added!');
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('pages.product.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $product->update($data);
        Alert::success('Updated successfully!');
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');

    }

    public function destroy(Product $product){
        $product->delete();
        Alert::success('Deleted successfully!');
        return redirect(route('product.index'))->with('success', 'Product deleted Succesffully');
    }
}
