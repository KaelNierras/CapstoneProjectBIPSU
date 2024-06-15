<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        // dd($request->all());
        try{
            Product::create([
                'name'=> $request->name,
            ]);

//            success alert
            return redirect()->back();

        } catch(\Exception $e){
//            error alert
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('pages.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Product::find($id);
            $data->name = $request->input('name');
            $data->save();

//            success alert
            return redirect()->back();

        } catch(\Exception $e){
//            error alert
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
//            success alert
        return redirect()->back();
    }
}
