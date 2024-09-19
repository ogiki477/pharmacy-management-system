<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class, 'login']);
Route::get('forgot',[AuthController::class,'forgot']); 
Route::post('login_post',[AuthController::class,'login_post']);

Route::post('forgot_post',[AuthController::class,'forgot_post']);

Route::get('reset/{token}',[AuthController::class,'getReset']);
Route::post('reset/{token}',[AuthController::class,'postReset']);


Route::group(['middleware' => 'admin'],function(){
    //dashboard
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    //customers
    Route::get('admin/customers',[CustomersController::class,'customers']);
    Route::get('admin/customers/add',[CustomersController::class,'add_customers']);
    Route::post('admin/customers/add',[CustomersController::class,'insert_add_customers']);
    Route::get('admin/customers/edit/{id}',[CustomersController::class,'edit_customers']);
    Route::post('admin/customers/edit/{id}',[CustomersController::class,'update_customers']);
    Route::get('admin/customers/delete/{id}',[CustomersController::class,'delete_customer']);
    //medicines
    Route::get('admin/medicines',[MedicinesController::class,'medicines']);
    Route::get('admin/medicines/add',[MedicinesController::class,'add_medicines']);
    Route::post('admin/medicines/add',[MedicinesController::class,'insert_add_medicines']);
    Route::get('admin/medicines/edit/{id}',[MedicinesController::class,'edit_medicines']);
    Route::post('admin/medicines/edit/{id}',[MedicinesController::class,'update_medicines']);
    Route::get('admin/medicines/delete/{id}',[MedicinesController::class,'delete_medicine']);
    //medicines_stock
    Route::get('admin/medicines_stock',[MedicinesController::class,'medicines_stock_list']);
    Route::get('admin/medicines_stock/add',[MedicinesController::class,'add_medicines_stock']);
    Route::post('admin/medicines_stock/add',[MedicinesController::class,'insert_add_medicines_stock']);
    Route::get('admin/medicines_stock/edit/{id}',[MedicinesController::class,'edit_medicines_stock']);
    Route::post('admin/medicines_stock/edit/{id}',[MedicinesController::class,'update_medicines_stock']);
    Route::get('admin/medicines_stock/delete/{id}',[MedicinesController::class,'delete_medicines_stock']);
    //suppliers
    Route::get('admin/suppliers',[SuppliersController::class,'suppliers']);
    Route::get('admin/suppliers/add',[SuppliersController::class,'suppliers_add']);
    Route::post('admin/suppliers/add',[SuppliersController::class,'insert_suppliers_add']);
    Route::get('admin/suppliers/edit/{id}',[SuppliersController::class,'suppliers_edit']);
    Route::post('admin/suppliers/edit/{id}',[SuppliersController::class,'update_suppliers']);
    Route::get('admin/suppliers/delete/{id}',[SuppliersController::class,'delete_suppliers']);
    //Invoices
    Route::get('admin/invoices',[InvoiceController::class,'index']);
    Route::get('admin/invoices/add',[InvoiceController::class,'create']);
    Route::post('admin/invoices/add',[InvoiceController::class,'store']);
    Route::get('admin/invoices/edit/{id}',[InvoiceController::class,'invoices_edit']);
    Route::post('admin/invoices/edit/{id}',[InvoiceController::class,'invoices_update']);
    Route::get('admin/invoices/delete/{id}',[InvoiceController::class,'delete']);
    
    //Purchases
    Route::prefix('admin/purchases/')->group(function(){

        Route::get('',[PurchasesController::class,'purchases']);
        Route::get('add',[PurchasesController::class,'purchases_add']);
        Route::post('add',[PurchasesController::class,'purchases_insert']);
        Route::get('edit/{id}',[PurchasesController::class,'purchases_edit']);
        Route::post('edit/{id}',[PurchasesController::class,'purchases_update']);
        Route::get('delete/{id}',[PurchasesController::class,'purchases_delete']);
        
    });

    //Acccount

    Route::get('admin/my_account',[AccountsController::class,'accounts']);
    Route::post('admin/my_account',[AccountsController::class,'accounts_update']);


    
});


Route::get('logout',[AuthController::class,'logout']);