<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('pages.inventory.index',compact('inventories'));
    }

    public function create()
    {
        $products = Product::all()->sortBy('name');
        $suppliers = Supplier::all()->sortBy('name');
        return view('pages.inventory.create',compact('products','suppliers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $supplier = Supplier::where('id', $request->supplier_id);
        $product = Product::where('id', $request->product_id);

        if ($supplier && $product) {
            Inventory::create([
                'supplier_id' => $request->supplier_id,
                'product_id' => $request->product_id,
                'stocks' => $request->stocks,
            ]);

//          success alert
            return redirect()->back();
        } else {
//            error alert
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Inventory::find($id);
        $products = Product::all()->sortBy('name');
        $suppliers = Supplier::all()->sortBy('name');
        return view('pages.inventory.edit', compact('data','products','suppliers'));
    }

    public function update(Request $request, $id)
    {
        $data = Inventory::find($id);
        $supplier = Supplier::find($request->input('supplier_id'));
        $product = Product::find($request->input('product_id'));

        if ($supplier && $product) {
            $duplicateCheck = Inventory::where('supplier_id', $request->input('supplier_id'))
                ->where('product_id', $request->input('product_id'))
                ->where('id', '!=', $id)
                ->first();

            if (!$duplicateCheck) {
                $data->supplier_id = $request->input('supplier_id');
                $data->product_id = $request->input('product_id');
                $data->stocks = $request->input('stocks');

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
        Inventory::find($id)->delete();
//      success alert
        return redirect()->back();
    }
}
