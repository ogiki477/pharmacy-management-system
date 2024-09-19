<?php

namespace App\Http\Controllers;

use App\Models\SuppliersModel;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function suppliers(){
        $data['getRecord'] = SuppliersModel::get();
        $data['meta_title'] = 'suppliers';
        return view('admin.suppliers.list',$data);
    }

    public function suppliers_add(Request $request){
        $data['meta_title'] = 'add suppliers';
        return view('admin.suppliers.add',$data);
    }

    public function insert_suppliers_add(Request $request){

        $save = new SuppliersModel;
        $save->suppliers_name = trim($request->suppliers_name);
        $save->suppliers_email = trim($request->suppliers_email);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->save();

        return redirect('admin/suppliers')->with('success','The Supplier has been saved Successfully');

    }

    public function suppliers_edit(Request $request,$id){
        // echo "Yoo";
        $data['getRecord'] = SuppliersModel::where('id',$id)->first();
        $data['meta_title'] = 'edit supplier';
        return view('admin.suppliers.edit',$data);
    }

    public function update_suppliers(Request $request,$id){
        $update = SuppliersModel::find($id);
        $update->suppliers_name = trim($request->suppliers_name);
        $update->suppliers_email = trim($request->suppliers_email);
        $update->contact_number = trim($request->contact_number);
        $update->address = trim($request->address);
        $update->save();

        return redirect('admin/suppliers')->with('success','The Supplier has been updated Successfully');
    }

    public function delete_suppliers($id){
        $delete = SuppliersModel::find($id);
        $delete->delete();
        return redirect('admin/suppliers')->with('error','The Supplier has been deleted Successfully');
    }


}
