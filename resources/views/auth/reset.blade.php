
@extends('layouts.app')


@section('content')
              <!-- login Page starts -->
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    @include('_message')
                    
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                    <p class="text-center small">Enter your password & confirm password</p>
                  </div>

                  <form  method="post" action="{{ url('reset/'. $token) }}"  class="row g-3 needs-validation" novalidate>
                        {{ csrf_field() }}
                    <div class="col-12">
                      <label  class="form-label">Password</label>
                      <div class="input-group has-validation">
                        
                        <input type="password" name="password" class="form-control"  required value="{{ old('password')}}">
                        <span style="color: red;">{{ $errors->first('password') }}</span>
                        <div class="invalid-feedback">Please enter your new password.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control"  required>
                      <span style="color: red;">{{ $errors->first('password') }}</span>
                      <div class="invalid-feedback">Confirm your password</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset</button>
                    </div>
                   
                  </form>

                </div>
              </div>

              <!-- login Page ends  -->
@endsection 
               