<?php

namespace App\Http\Controllers;

use App\Models\InvoicesModel;
use App\Models\PurchaseModel;
use App\Models\SuppliersModel;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function purchases(Request $request){
        $data['getRecord'] = PurchaseModel::get();
        $data['meta_title'] = 'Purchases';
        return view('admin.purchases.list',$data);
    }

    public function purchases_add(Request $request){
        $data['GetSuppliers'] = SuppliersModel::get();
        $data['GetInvoices']  = InvoicesModel::get();
        $data['meta_title'] = 'add Purchase';
        return view('admin.purchases.add',$data);
    }

    public function purchases_insert(Request $request){

        //dd($request->all());
        $data = new PurchaseModel;
        
        $data->suppliers_id = $request->suppliers_id;
        $data->invoices_id  = $request->invoices_id;
        $data->voucher_number = $request->voucher_number;
        $data->purchase_date = $request->purchase_date;
        $data->total_amount = $request->total_amount;
        $data->payment_status = $request->payment_status;
        $data->save();

        return redirect('admin/purchases')->with('success','The purchase has been created Successfully');
        
    }

    public function purchases_edit(Request $request , $id)
    {
        $data['GetSuppliers'] = SuppliersModel::get();
        $data['GetInvoices']  = InvoicesModel::get();
        $data['getRecord'] = PurchaseModel::find($id);
        $data['meta_title'] = 'edit Purchases';
        return view('admin.purchases.edit',$data);
        
    }

    public function purchases_update(Request $request, $id){

        $data = PurchaseModel::find($id);
        $data->suppliers_id = $request->suppliers_id;
        $data->invoices_id  = $request->invoices_id;
        $data->voucher_number = $request->voucher_number;
        $data->purchase_date = $request->purchase_date;
        $data->total_amount = $request->total_amount;
        $data->payment_status = $request->payment_status;
        $data->save();

        return redirect("admin/purchases")->with('success','The Purchase Has Been Updated Successfully');

    }

    public function purchases_delete($id){
        $data = PurchaseModel::find($id);
        $data->delete();
        return redirect("admin/purchases")->with('error','The Purchase Has Been Deleted Successfully');
    }
}
