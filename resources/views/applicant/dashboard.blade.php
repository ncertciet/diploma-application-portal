<?php
$user = Auth::user();
$reg_id = $user->reg_id;
//dd($reg_id);
$applications = \Illuminate\Support\Facades\DB::table('applications')->where('reg_id', $reg_id)->get();
$count = count($applications);
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
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                {{-- {{ session('status') }} --}}
                            </div>
                        @endif

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Application ID.</th>
                                        <th>Step Completed</th>
                                        <th>Application Status</th>
                                        <th>Actions</th>
                                        @foreach ($applications as $application)
                                            <?php if(($application->status) == 'completed'):?>
                                            <th>View Application</th>
                                            <?php endif?>
                                        @endforeach
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td><strong>{{ $application->application_id }}</strong></td>

                                            <td>{{ $application->step }} step completed out of 6</td>

                                            <?php if(($application->status) == 'pending'):?>
                                            <td><h5><span class="badge badge-warning"><i class="fas fa-exclamation-triangle"></i> {{ ucfirst($application->status) }}</span></h5></td>
                                            <?php endif?>

                                            <?php if(($application->status) == 'completed'):?>
                                            <td><h5><span class="badge badge-success"><i class="far fa-check-circle"></i> {{ ucfirst($application->status) }}</span></h5></td>
                                            <?php endif?>

                                            
                                            
                                            {{-- <td><a href="/applicant/application/step{{($application->step)+1}}" class="btn btn-warning">Resume</a></td> --}}
                                            <td><a href="{{ route('application.form.step1')}}" class="btn btn-primary "><i class="fas fa-redo"></i> Resume</a></td>


                                            <?php if(($application->status) == 'completed'):?>
                                            <td><a href="{{ route('application.view-application') }}" class="btn btn-danger " ><i class="far fa-eye"></i> View Application</a></td>
                                            <?php endif?>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

{{--                            @if(!$count === 0)--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Application ID.</th>--}}
{{--                                            <th>Step Completed</th>--}}
{{--                                            <th>Application Status</th>--}}
{{--                                            <th>Actions</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}

{{--                                        <tbody>--}}
{{--                                        @foreach ($applications as $application)--}}
{{--                                            <tr>--}}
{{--                                                <td><strong>{{ $application->application_id }}</strong></td>--}}
{{--                                                <td>{{ $application->step }} step completed out of 5</td>--}}
{{--                                                <td>{{ ucfirst($application->status) }}</td>--}}
{{--                                                <td><a href="#" class="btn btn-warning">Resume</a></td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            @else--}}

{{--                                <h3 class="text-center text-primary">You don't fill your Application <a href="{{ route('application.form.step1')}}" class="btn btn-success">Get Started Now</a></h3>--}}

{{--                            @endif--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
