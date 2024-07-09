@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- row -->

<div class="row">
    <div class="col-xl-12">
         @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show">
                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                <strong>Welcome {{ auth()->user()->name }}</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
        @else
            <div class="alert alert-primary alert-dismissible fade show">
                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                <strong>Hi {{ auth()->user()->name }}, </strong>kamu berhasil login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>    
        @endif   
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">USERS</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form methode="POST" action="/update-pasword">
                                        <div class="mb-3">
                                            <label for="email">E-Mail</label>
                                            <input type="text" class="form-control input-default " value="{{ $user->email }} " placeholder="input-default">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control input-rounded" value="{{ $user->name }}" placeholder="input-rounded">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="clientGrowthChart"></div>

                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
            <canvas id="dailyRevenueChart"></canvas>
            
            </div>
            <div class="col-xl-6">
                <div id="monthlyRevenueChart"></div>
               
            </div>
        </div>
    </div>

@endsection