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
            
            <div class="row justify-content-center text-center py-4" >
                <div class="col-sm-6">
                    <h3 class="text-success mb-3">Your application has been submitted successfully.</h3>
                    <h4>Your application number @foreach ($applications as $application)<strong>{{ $application->application_id }}</strong>@endforeach</h4>
                    {{-- {{ $application->name }} --}}
                    <p>Please note it for future refrence.</p>
                </div>
               
            </div>

            <div id="receipt" style="display:none;">
                {{-- <h4>Your application number @foreach ($applications as $application)<strong>{{ $application->application_id }}</strong>@endforeach</h4>
                    {{ $application->name }} --}}
                    <h4>Diploma Application NCERT</h4>
                    <p>Application No. - {{ $application->application_id }}</p>
                    <p>Name - {{ $application->name }}</p>
                    <p>Submit Date - {{ $application->submit_date }}</p>

                   
            </div>

            <div id="editor"></div>
            <a href="{{ route('export-pdf') }}" class="btn btn-primary" >Download Receipt</a>
            <a href="{{ route('application.view-application') }}" class="btn btn-primary" >View Application</a>
            {{-- <button id="cmd" class="btn btn-secondary" data-name="{{ $application->application_id }}">Download Receipt</button> --}}

        </div>
    </div>
</div>






{{-- 
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script>

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
    
};

$('#cmd').click(function () {   
    doc.fromHTML($('#receipt').html(), 25, 25, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    var $name = $('#cmd').data( "name")
    // console.log($name);
    doc.save($name+'.pdf');
});

</script> --}}


@endsection