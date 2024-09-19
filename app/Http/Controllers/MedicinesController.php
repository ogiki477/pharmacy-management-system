<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinesModel;
use App\Models\MedicinesStock;

class MedicinesController extends Controller
{
    public function medicines(Request $request){
        $data['getRecord'] = MedicinesModel::get();
        $data['meta_title'] = 'medicines';
        return view('admin.medicines.list',$data);
    }

    public function add_medicines(Request $request){
        $data['meta_title'] = 'add medicine';
        return view('admin.medicines.add',$data);
    }

    public function insert_add_medicines(Request $request){
       // dd($request->all());
       $saveUpdate = new MedicinesModel;
       $saveUpdate->name = $request->name;
       $saveUpdate->packing = $request->packing;
       $saveUpdate->generic_name = $request->generic_name;
       $saveUpdate->supplier = $request->supplier;
       $saveUpdate->save();

       return redirect('admin/medicines')->with('success','Medicine Successfully Added');


    }

    public function edit_medicines($id,Request $request){
        $data['getRecord'] = MedicinesModel::find($id);
        $data['meta_title'] = 'edit medicines';
       
        return view('admin.medicines.edit',$data);
    }

    public function update_medicines($id,Request $request){
        $save = MedicinesModel::find($id);
        $save->name = trim($request->name);
        $save->packing= trim($request->packing);
        $save->generic_name= trim($request->generic_name);
        $save->supplier= trim($request->supplier);
        
        $save->save();

        return redirect('admin/medicines')->with('success','Medicine Successfully Updated');
    }


    public function delete_medicine($id, Request $request){
        $delete_record = MedicinesModel::find($id);
        $delete_record->delete();
        return redirect('admin/medicines')->with('error','Medicine deleted'); 
    }


    public function medicines_stock_list(Request $request){
        $data['getRecord'] = MedicinesStock::get();
        $data['meta_title'] = 'medicines stock';
         return view('admin.medicines_stock.list',$data);
    }

    public function add_medicines_stock(Request $request){
        $data['getRecord'] = MedicinesModel::get();
        $data['meta_title'] = 'add medicine stock';
        return view('admin.medicines_stock.add',$data);
    }

    public function insert_add_medicines_stock(Request $request){
        //dd($request->all());
        $save = new MedicinesStock;
        $save->medicines_model_id = $request->medicines_model_id;
        $save->batch_id = $request->batch_id;
        $save->expiry_date = $request->expiry_date;
        $save->quantity = $request->quantity;
        $save->mrp = $request->mrp;
        $save->rate = $request->rate;
        $save->save();

        return redirect('admin/medicines_stock')->with('success','Medicine Stock Successfully Added');
    }

    public function edit_medicines_stock($id,Request $request){
        $data['oldRecord'] = MedicinesStock::find($id);
        $data['getRecord'] = MedicinesModel::get();
        $data['meta_title'] = 'edit medicines stock';
        return view('admin.medicines_stock.edit',$data);
    }

    public function update_medicines_stock($id,Request $request){
        
        $save = MedicinesStock::find($id);
        $save->medicines_model_id = $request->medicines_model_id;
        $save->batch_id = $request->batch_id;
        $save->expiry_date = $request->expiry_date;
        $save->quantity = $request->quantity;
        $save->mrp = $request->mrp;
        $save->rate = $request->rate;
        $save->save();

        return redirect('admin/medicines_stock')->with('success','Medicine Stock Successfully Updated');
    }

    public function delete_medicines_stock($id, Request $request){
        $delete_record = MedicinesStock::find($id);
        $delete_record->delete();
        return redirect('admin/medicines_stock')->with('error','Medicine Stock deleted'); 
    }

}
