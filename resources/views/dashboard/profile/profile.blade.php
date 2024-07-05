@extends('dashboard.layouts.app')

@section('title', 'Profile')
@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">@yield('title')</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form class="form-valide-with-icon needs-validation" method="POST" novalidate="" action="{{ route('updatepassword') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="text-label form-label" for="validationCustomUsername">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Enter a username.." required="">
                                <div class="invalid-feedback">
                                    Please Enter a username.
                                    </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-label form-label" for="dlab-password">Password *</label>
                            <div class="input-group transparent-append">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                <input type="password" name="password" class="form-control" id="dlab-password" placeholder="Choose a safe one.." required="">
                                <span class="input-group-text show-pass"> 
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                                <div class="invalid-feedback">
                                    Please Enter a username.
                                </div>
                            </div>
                        </div> 
                        <div class="mb-3">
                            <label class="text-label form-label" for="dlab-password2">Password *</label>
                            <div class="input-group transparent-append">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                <input type="password" class="form-control" id="dlab-password2" placeholder="Choose a safe one.." required="">
                                <span class="input-group-text show-pass"> 
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                                <div class="invalid-feedback">
                                    Please Enter a username.
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn me-2 btn-primary">Submit</button>
                        <button type="submit" class="btn btn-light">cencel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection