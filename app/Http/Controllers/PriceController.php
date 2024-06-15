<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('pages.price.index',compact('prices'));
    }

    public function create()
    {
        $products = Product::all()->sortBy('name');
        return view('pages.price.create', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $product = Product::where('id', $request->product_id);

        if ($product) {
            Price::create([
                'product_id' => $request->product_id,
                'amount' => $request->amount,
            ]);

//          success alert
            return redirect()->back();
        } else {
//          error alert
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Price::find($id);
        $products = Product::all()->sortBy('name');
        return view('pages.price.edit', compact('data','products'));
    }

    public function update(Request $request, $id)
    {
        $data = Price::find($id);
        $product = Product::find($request->input('product_id'));

        if ($product) {
            $duplicateCheck = Product::where('product_id', $request->input('product_id'))
                ->where('id', '!=', $id)
                ->first();

            if (!$duplicateCheck) {
                $data->product_id = $request->input('product_id');
                $data->amount = $request->input('amount');

                $data->save();
//                success alert
                return redirect()->back();

            } else {
//                error alert
                return redirect()->back();
            }
        } else {
//                error alert
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Price::find($id)->delete();
//                success alert
        return redirect()->back();
    }
}
