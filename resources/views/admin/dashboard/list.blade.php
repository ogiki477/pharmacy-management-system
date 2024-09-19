@extends('admin.layouts._app')

 
@section('content')
 

<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-16">
          
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <a href="{{ url('admin/customers')}}">
                  <div class="card-body">
                    <h5 class="card-title">Customers</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$totalcustomers}}</h6>
                      </div>
                    </div>
                  </div>
                </a>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
               <a href="{{ url('admin/medicines')}}">
                <div class="card-body">
                  <h5 class="card-title">Medicines</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-dash-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalmedicines}}</h6>
                     </div>
                  </div>
                </div>
               </a>

              </div>
            </div><!-- End Revenue Card -->
          </div>

          <!-- Medicine Stock -->
          <div class="row">
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
               <a href="{{ url('admin/medicines_stock')}}">
                <div class="card-body">
                  <h5 class="card-title">Medicine Stock</h5>
  
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bag"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalmedicinesstock}}</h6>
                     </div>
                  </div>
                </div>
               </a>
  
              </div>
            </div>

            <!-- Suppliers -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
               <a href="{{ url('admin/suppliers')}}">
                <div class="card-body">
                  <h5 class="card-title">Suppliers</h5>
  
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-house-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalsuppliers}}</h6>
                     </div>
                  </div>
                </div>
               </a>
  
              </div>
            </div>

          </div>



           <!-- Invoices -->
           <div class="row">
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
               <a href="{{ url('admin/invoices')}}">
                <div class="card-body">
                  <h5 class="card-title">Invoices</h5>
  
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalinvoices}}</h6>
                     </div>
                  </div>
                </div>
               </a>
  
              </div>
            </div>

          <!-- Purchases -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
               <a href="{{ url('admin/purchases')}}">
                <div class="card-body">
                  <h5 class="card-title">Purchases</h5>
  
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalpurchases}}</h6>
                     </div>
                  </div>
                </div>
               </a>
  
              </div>
            </div>

          </div>


          

          
        </div><!-- End Left side columns -->
      </div>
    </section>

 

  @endsection

 