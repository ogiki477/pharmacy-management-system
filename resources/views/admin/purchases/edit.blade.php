@extends('admin.layouts._app')

@section('content')

<div class="pagetitle">
     <h1>Edit Purchase</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <h5 class="card-title">Purchase</h5>

                    <form action="{{ url('admin/purchases/edit/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="suppliers_id" id="" required>
                                 
                                    @foreach ($GetSuppliers as $GetSupplier)

                                    <option {{ ($GetSupplier->id == $getRecord->suppliers_id) ? 'selected' : ''}} value="{{ $GetSupplier->id}}">{{$GetSupplier->suppliers_name}}</option>
                                        
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Invoices <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="invoices_id" id="" required>
                                    
                                    @foreach($GetInvoices as $GetInvoice)
                                      <option {{($GetInvoice->id==$getRecord->id) ? 'selected' : ''}} value="{{$GetInvoice->id}}">{{$GetInvoice->id}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="row mb-3"> 
                            <label class="col-sm-2 col-form-label">Voucher Number<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="voucher_number" class="form-control" required value="{{$getRecord->voucher_number}}" >
                            </div>
                        </div>


                        <div class="row mb-3"> 
                            <label class="col-sm-2 col-form-label">Purchase Date<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="purchase_date" class="form-control" required value="{{$getRecord->purchase_date}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3"> 
                            <label class="col-sm-2 col-form-label">Total Amount<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="total_amount" class="form-control" required value="{{$getRecord->total_amount}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Payment Status <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="payment_status" id="" required>
                                    
                                    <Option {{( $getRecord->payment_status == "1") ? 'selected' : '' }} value="1">Pending</Option>
                                    <Option  {{($getRecord->payment_status == "2") ? 'selected' : '' }} value="2">Accept</Option>
                                    <Option {{($getRecord->payment_status == "3") ? 'selected' : '' }} value="3">Cancel</Option>
                                </select>
                                
                            </div>
                        </div>
                        
                        

                       <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection