<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            Supplier::create([
                'name'=> $request->name,
                'contact'=> $request->contact,
                'email'=> $request->email,
                'address'=> $request->address,
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
        $data = Supplier::find($id);
        return view('admin.supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Supplier::find($id);
            $data->name = $request->input('name');
            $data->contact = $request->input('contact');
            $data->email = $request->input('email');
            $data->address = $request->input('address');
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
        Supplier::find($id)->delete();
//        deleted alert
        return redirect()->back();
    }
}
