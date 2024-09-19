<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CustomersModel;


class CustomersController extends Controller
{
    public function customers(Request $request){
        //$data['getRecord'] = CustomersModel::get(); //first option 
        $data['getRecord']  = CustomersModel::getAllRecord(); //second option from the model's method
        $data['meta_title'] = 'customers';
        return view('admin.customers.list',$data);
    }

    public function add_customers(Request $request){
        $data['meta_title'] = 'add customers';
        return view('admin.customers.add',$data);

    }

    public function insert_add_customers(Request $request){

        //dd($request->all());

        $save = new CustomersModel;

        $save->name = trim($request->name);
        $save->contact_number= trim($request->contact_number);
        $save->address= trim($request->address);
        $save->doctor_name= trim($request->doctor_name);
        $save->doctor_address= trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success','Customer Successfully Created');
       
        }

    public function edit_customers($id, Request $request){
        //echo $id; die();
        //$data['getRecord']= CustomersModel::find($id);
        $data['getRecord']= CustomersModel::getSingle($id);
        $data['meta_title'] = 'edit customers';
        
        return view('admin.customers.edit',$data);
    }

    public function update_customers($id, Request $request){
        
        //$save = CustomersModel::find($id);
        $save = CustomersModel::getSingle($id);
        $save->name = trim($request->name);
        $save->contact_number= trim($request->contact_number);
        $save->address= trim($request->address);
        $save->doctor_name= trim($request->doctor_name);
        $save->doctor_address= trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success','Customer Successfully Updated');
       
    }

    public function delete_customer($id , Request $request){
       // echo $id; die();
       //$delete_record = CustomersModel::find($id);
       $delete_record = CustomersModel::getSingle($id);
       $delete_record->delete();

       return redirect('admin/customers')->with('error','Customer Successfully Deleted');
       

    }
}
