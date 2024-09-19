<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use App\Models\InvoicesModel;
use App\Models\MedicinesModel;
use App\Models\MedicinesStock;
use App\Models\PurchaseModel;
use App\Models\SuppliersModel;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
       
       $data['totalcustomers'] = CustomersModel::get()->count(); 
       $data['totalmedicines'] = MedicinesModel::get()->count();
       $data['totalmedicinesstock'] = MedicinesStock::get()->count();
       $data['totalsuppliers'] = SuppliersModel::get()->count();
       $data['totalinvoices'] = InvoicesModel::get()->count();
       $data['totalpurchases'] = PurchaseModel::get()->count();
       $data['meta_title'] = 'Dashboard';
       return view('admin.dashboard.list',$data);
    //    $password = '1234';
    //    $hashedPassword = Hash::make($password);
    //    dd($hashedPassword);
    }
}
