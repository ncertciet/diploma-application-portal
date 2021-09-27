@php
// $user = Auth::user();
// $reg_id = $user->reg_id;
// $application = \Illuminate\Support\Facades\DB::table('applications')->get();

$study_centre = Auth::user()->study_centre;
//dd($study_centre);
//$registration = DB::select('select * from users where type = "user"');
//$applications_all = DB::select('select * from applications where study_centre = $study_centre'); 
// $applications_comp = DB::select('select * from applications where status = "completed"');
// $applications_all = DB::select('select * from applications');
//$applications_pending = DB::select('select * from applications where status = "pending"');

 $applications_all = DB::table('applications')->where('study_centre', $study_centre)->get();
 $applications_comp = DB::table('applications')->where('study_centre', $study_centre)->where('status', 'completed')->get();
 $applications_pending = DB::table('applications')->where('study_centre', $study_centre)->where('status', 'pending')->get();

 $applications_general = DB::table('applications')->where('study_centre', $study_centre)->where('category', 'General')->where('status', 'completed')->get();
 $applications_obc = DB::table('applications')->where('study_centre', $study_centre)->where('category', 'OBC')->where('status', 'completed')->get();
 $applications_sc = DB::table('applications')->where('study_centre', $study_centre)->where('category', 'SC')->where('status', 'completed')->get();
 $applications_st = DB::table('applications')->where('study_centre', $study_centre)->where('category', 'ST')->where('status', 'completed')->get();
 $applications_ews = DB::table('applications')->where('study_centre', $study_centre)->where('category', 'EWS')->where('status', 'completed')->get();
 $applications_dis = DB::table('applications')->where('study_centre', $study_centre)->where('disability', 'Yes')->where('status', 'completed')->get();

 
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
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- <h3>{{ __('This is Study Centre Dashboard') }} {{ date('d-m-Y') }}</h3> --}}

                        <div class="dashboard-page">
                            <div class="row">
                                <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                                    <div class="card illustration flex-fill">
                                        <div class="card-body py-4">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <p class="mb-2"></p>
                                                    <p class="mb-2 font-weight-bold">Summary of applications for their study center.</p>
                                                </div>
                                                <div class="d-inline-block ms-3">
                                                    <div class="stat">
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
                                            <a href="{{ route('rie-applications') }}">
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
                                            <a href="{{ route('rie-comp-applications') }}">
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
                                            <a href="{{ route('rie-pending-applications') }}">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <h3 class="mb-2">{{ count($applications_pending) }}</h3>
                                                        <p class="mb-2">Pending Application</p>
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


                            {{-- <div class="row">
                                <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body py-4">
                                            <a href="{{ route('rie-comp-applications') }}">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <h3 class="mb-2">{{ count($applications_comp) }}</h3>
                                                        <p class="mb-2">Complete Application</p>
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
                                            <a href="{{ route('rie-applications') }}">
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
                            </div> --}}


                             <div class="row">
                                <div class="col-12 col-sm-6  d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body py-4">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <h3 class="mb-4 illustration"> Category-wise Applications <i class="fas fa-graduation-cap float-right"></i></h3>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <p>Disability Category</p>    
                                                                </div>   
                                                                <div class="col-sm-3 text-right nmbr"><h3>{{ count($applications_dis) }}</h3> </div>    
                                                            </div> 
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <p>General Category</p>    
                                                                </div>   
                                                                <div class="col-sm-3 text-right nmbr"><h3>{{ count($applications_general) }}</h3> </div>    
                                                            </div> 
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <p>OBC Category</p>    
                                                                </div>   
                                                                <div class="col-sm-3 text-right nmbr"><h3>{{ count($applications_obc) }}</h3> </div> 
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <p>SC Category</p>    
                                                                </div>   
                                                                <div class="col-sm-3 text-right nmbr"><h3>{{ count($applications_sc) }}</h3> </div>    
                                                            </div> 
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <p>ST Category</p>    
                                                                </div>   
                                                                <div class="col-sm-3 text-right nmbr"><h3>{{ count($applications_st) }}</h3> </div>    
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <p>EWS Category</p>    
                                                                </div>   
                                                                <div class="col-sm-3 text-right nmbr"><h3>{{ count($applications_ews) }}</h3> </div>   
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
