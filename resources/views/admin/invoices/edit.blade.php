@extends('admin.layouts._app')


@section('content')
<div class="pagetitle">
     <h1>Edit Invoice</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <h5 class="card-title">Invoice</h5>

                    <form action="{{ url('admin/invoices/edit/'. $EditRecord->id )}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Customer Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                            <select class="form-control" name="customers_id"  required>
                                   <option value="">Select Customer Name </option>
                                   @foreach($getRecord as $value)
                                   <option {{($value->id == $EditRecord->customers_id) ? 'selected' : ''}} value="{{ $value->id }}">{{$value->name}}</option>
                                   @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Net Total<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="net_total" value="{{ $EditRecord->net_total}}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Invoices Date<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="invoices_date" value="{{ $EditRecord->invoices_date}}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Amount<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $EditRecord->total_amount}}" name="total_amount" class="form-control" required>
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Discount<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="total_discount" value="{{ $EditRecord->total_discount}}" class="form-control" required>
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