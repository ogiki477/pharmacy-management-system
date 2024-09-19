<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use App\Models\InvoicesModel;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = InvoicesModel::get();
        $data['meta_title'] = 'invoices';
        return view('admin.invoices.list',$data);
    }

    public function create(Request $request){
        $data['getRecord'] = CustomersModel::get();
        $data['meta_title'] = 'add invoices';
        return view('admin.invoices.add',$data);
    }

    public function store(Request $request){
        //dd($request->all());
        $save = new InvoicesModel;
        $save->net_total = trim($request->net_total);
        $save->invoices_date = trim($request->invoices_date);
        $save->customers_id = trim($request->customers_id);
        $save->total_amount = trim($request->total_amount);
        $save->total_discount = trim($request->total_amount);
        $save->save();

        return redirect('admin/invoices')->with('success','Invoices Successfully Created');

    }

    public function invoices_edit($id,Request $request){
          //dd($id);
        $data['EditRecord'] = InvoicesModel::find($id);
        $data['getRecord'] = CustomersModel::get();
        $data['meta_title'] = 'edit invoices';
        return view('admin.invoices.edit',$data);
    }

    public function invoices_update($id,Request $request){
        //dd($request->all());
        $update = InvoicesModel::find($id);
        $update->customers_id = trim($request->customers_id);
        $update->net_total = trim($request->net_total);
        $update->invoices_date = trim($request->invoices_date);
        $update->total_amount = trim($request->total_amount);
        $update->total_discount = trim($request->total_discount);
        $update->save();
        return redirect('admin/invoices')->with('success','Invoices Successfully Updated');

    }
 
    public function delete($id,Request $request){
        $deleteRecord = InvoicesModel::find($id);
        $deleteRecord->delete();
        return redirect('admin/invoices')->with('error','Invoices Successfully Deleted');

    }
}
 