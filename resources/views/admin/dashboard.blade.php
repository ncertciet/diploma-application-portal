@php
// $user = Auth::user();
// $reg_id = $user->reg_id;
// $application = \Illuminate\Support\Facades\DB::table('applications')->get();
$registration = DB::select('select * from users where type = "user"');
$applications_all = DB::select('select * from applications');   
$applications_comp = DB::select('select * from applications where status = "completed"');
$applications_pending = DB::select('select * from applications where status = "pending"');

$rie_delhi = DB::select('select * from applications where study_centre = "Department of Educational Psychology and Foundations of Education NCERT, New Delhi"');
$rie_ajmer = DB::select('select * from applications where study_centre = "Regional Institute of Education, Ajmer"');
$rie_bhopal = DB::select('select * from applications where study_centre = "Regional Institute of Education, Bhopal"');
$rie_bhubaneswar = DB::select('select * from applications where study_centre = "Regional Institute of Education, Bhubaneswar"');
$rie_mysuru = DB::select('select * from applications where study_centre = "Regional Institute of Education, Mysuru"');
$rie_shillong = DB::select('select * from applications where study_centre = "North East Regional Institute of Education (NERIE), Shillong"');

$applications_general = DB::table('applications')->where('category', 'General')->where('status', 'completed')->get();
$applications_obc = DB::table('applications')->where('category', 'OBC')->where('status', 'completed')->get();
$applications_sc = DB::table('applications')->where('category', 'SC')->where('status', 'completed')->get();
$applications_st = DB::table('applications')->where('category', 'ST')->where('status', 'completed')->get();
$applications_ews = DB::table('applications')->where('category', 'EWS')->where('status', 'completed')->get();
$applications_dis = DB::table('applications')->where('disability', 'Yes')->where('status', 'completed')->get();

$applications_male = DB::table('applications')->where('gender', 'Male')->where('status', 'completed')->get();
$applications_female = DB::table('applications')->where('gender', 'Female')->where('status', 'completed')->get();
$applications_trans = DB::table('applications')->where('gender', 'Transgender')->where('status', 'completed')->get();

// dd($applications_comp)
@endphp

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
            <div class="card application-form shadow">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- <h3>{{ __('This is Aadmin Dashboard') }} {{ date('d-m-Y') }}</h3> --}}
                    <div class="dashboard-page">
                        <div class="row">
                            <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                                <div class="card illustration flex-fill">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h3 class="mb-2">{{ count($registration) }}</h3>
                                                {{-- {{count($rie_delhi)}} --}}
                                                <p class="mb-2">Registered on the Portal</p>
                                                {{-- <div class="mb-0">
                                                    <span class="badge badge-soft-success me-2"> <i class="mdi mdi-arrow-bottom-right"></i> +5.35% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div> --}}
                                            </div>
                                            <div class="d-inline-block ms-3">
                                                <div class="stat">
                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle text-success"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> --}}
                                                    <img src="https://img.icons8.com/officexs/50/000000/edit-user-male.png"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <a href="{{ route('all-applications') }}">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <h3 class="mb-2">{{ count($applications_all) }}</h3>
                                                    <p class="mb-2">Started Filling Application</p>
                                                </div>
                                                <div class="d-inline-block ms-3">
                                                    <div class="stat">
                                                        <img src="https://img.icons8.com/fluency/48/000000/petition.png"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <a href="{{ route('applications') }}">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <h3 class="mb-2">{{ count($applications_comp) }}</h3>
                                                    <p class="mb-2">Submitted Applications</p>
                                                </div>
                                                <div class="d-inline-block ms-3">
                                                    <div class="stat">
                                                        <img src="https://img.icons8.com/nolan/50/paid-bill.png"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <a href="{{ route('pending-applications') }}">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <h3 class="mb-2">{{ count($applications_pending) }}</h3>
                                                    <p class="mb-2">Pending Applications</p>
                                                </div>
                                                <div class="d-inline-block ms-3">
                                                    <div class="stat">
                                                        <img src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-time-delivery-kiranshastry-gradient-kiranshastry.png"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-6  d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h3 class="mb-4 illustration"> Studycenter-wise Applications Received <i class="fas fa-graduation-cap float-right"></i></h3>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Department of Educational Psychology and Foundations of Education, NIE, NCERT, New Delhi</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr"><h3>{{count($rie_delhi)}}</h3> </div>    
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Regional Institute of Education, Ajmer</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr"><h3>{{count($rie_ajmer)}}</h3> </div>    
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Regional Institute of Education, Bhopal</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr"><h3>{{count($rie_bhopal)}}</h3> </div> 
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Regional Institute of Education, Bhubaneswar</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr"><h3>{{count($rie_bhubaneswar)}}</h3> </div>    
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Regional Institute of Education, Mysuru</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr"><h3>{{count($rie_mysuru)}}</h3> </div>    
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>North East Regional Institute of Education (NERIE), Shillong</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr"><h3>{{count($rie_shillong)}}</h3> </div>   
                                                        </div> 
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6  d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h3 class="mb-4 illustration2">Category-wise Applications <i class="fas fa-graduation-cap float-right"></i></h3>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Disability Category</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_dis) }}</h3> </div>    
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>General Category</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_general) }}</h3> </div>    
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>OBC Category</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_obc) }}</h3> </div> 
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>SC Category</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_sc) }}</h3> </div>    
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>ST Category</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_st) }}</h3> </div>    
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>EWS Category</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_ews) }}</h3> </div>   
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Male</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_male) }}</h3> </div>   
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Female</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_female) }}</h3> </div>   
                                                        </div> 
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <p>Transgender</p>    
                                                            </div>   
                                                            <div class="col-sm-3 text-right nmbr2"><h3>{{ count($applications_trans) }}</h3> </div>   
                                                        </div> 
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                        
                        </div>


                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
