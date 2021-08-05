@extends('layouts.sidebar')

@section('content')
    @php($user = Auth::user())
    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="fas fa-chart-bar mr-1"></i> Dashboard</h1>
                        <div class="page-header-subtitle">
                            Welcome {{ $user->name }}, Here is your overview
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="inner-container container-xl">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>{{ __('This is Aadmin Dashboard') }} {{ date('d-m-Y') }}</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
