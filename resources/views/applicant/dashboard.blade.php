<?php
$user = Auth::user();
$reg_id = $user->reg_id;
//dd($reg_id);
$applications = \Illuminate\Support\Facades\DB::table('applications')->where('reg_id', $reg_id)->get();
//dd($applications);
?>
@extends('layouts.sidebar')

@section('content')
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
                <div class="card shadow">

                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Reg ID.</th>
                                        <th>Application Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td><strong>{{ $application->reg_id }}</strong></td>
                                            <td>{{ ucfirst($application->status) }}</td>
                                            <td><a href="#" class="btn btn-warning">Resume</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
