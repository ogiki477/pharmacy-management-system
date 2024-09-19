@extends('admin.layouts._app')


@section('content')

<div class="pagetitle">
     <h1> Purchases Lists</h1>
</div>

<section class="section">
    <div class = "row">
        <div class="col=lg-12">
             
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('admin/purchases/add')}}" class = "btn btn-primary">Add New Purchase</a>
                    </h5>

                    <table class= "table datatable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Suppliers Name</th>
                                <th scope="col">Invoices ID</th>
                                <th scope="col">Voucher Number</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $getRecord)
                            <tr>
                               <th scope="row">{{$getRecord->id}}</th>
                               <td>{{ $getRecord->getSuppliersName->suppliers_name}}</td>
                               <td>{{ $getRecord->invoices_id}}</td>
                               <td>{{ $getRecord->voucher_number}}</td>
                               <td>{{ $getRecord->purchase_date}}</td>
                               <td>{{ $getRecord->total_amount}}</td>
                               <td>
                                @if ($getRecord->payment_status==1)
                                    Pending
                                @elseif($getRecord->payment_status==2)
                                Accept
                                @elseif($getRecord->payment_status == 3)
                                Cancel
                                @endif
                                
                                
                               </td>
                               <td>{{ $getRecord->created_at}}</td>
                                
                                <td> 
                                    <a href="{{ url('admin/purchases/edit/'.$getRecord->id)}}" class="btn btn-success"> <i class="bi bi-pencil-square"></i> </a>
                                    <a href="{{ url('admin/purchases/delete/'.$getRecord->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash"></i></a>
                                    
                                </td>
                                
                            </tr>

                            @endforeach
                            
                           
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 

