@extends('admin.layouts._app')


@section('content')
<div class="pagetitle">
     <h1>Update Profile</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <h5 class="card-title">Update Profile</h5>

                    <form action="{{ url('admin/my_account/')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Name <span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{$getRecord->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email<span style="color: red;"> *</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required value="{{$getRecord->email}}">
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Profile Picture<span style="color: red;"></span></label>
                            <div class="col-sm-10">
                                <input type="file" name="profile_picture" class="form-control">

                                @if(!empty($getRecord->profile_picture))
                                <img src="{{$getRecord->getProfilePicture()}}" height="200px" width="200px" alt="">

                                @endif
                                
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
                                (Leave blank if you are not changing the password)
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