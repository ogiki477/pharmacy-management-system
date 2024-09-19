@extends('admin.layouts._app')


@section('content')
<div class="pagetitle">
     <h1>Edit Supplier</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <h5 class="card-title">Supplier</h5>

                    <form action="{{ url('admin/suppliers/edit/'. $getRecord->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Suppliers  Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="suppliers_name" class="form-control" required value="{{$getRecord->suppliers_name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier Email <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="suppliers_email" class="form-control" required value="{{$getRecord->suppliers_email}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Contact Number <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_number" class="form-control" required value="{{$getRecord->contact_number}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Address<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control" required value="{{$getRecord->address}}">
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