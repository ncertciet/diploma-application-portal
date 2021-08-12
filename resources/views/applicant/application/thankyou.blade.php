@php
$user = Auth::user();
$reg_id = $user->reg_id;
  $applications = \Illuminate\Support\Facades\DB::table('applications')->where('reg_id', $reg_id)->get();  
@endphp

@extends('layouts.sidebar')

@section('content')
@php($user = Auth::user())


    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        {{-- <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> </h1> --}}
                        <div class="page-header-subtitle">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="inner-container container-xl">
        <div class="application-form shadow">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif
            
            <div class="row justify-content-center text-center py-4">
                <div class="col-sm-6">
                    <h3 class="text-success mb-3">Your application has been submitted successfully.</h3>
                    <h4>Your application number @foreach ($applications as $application)<strong>{{ $application->application_id }}</strong>@endforeach</h4>
                    <p>Please note it for future refrence.</p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection