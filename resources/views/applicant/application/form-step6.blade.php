@php
$user = Auth::user();
$reg_id = $user->reg_id;
$application = \Illuminate\Support\Facades\DB::table('applications')->where('reg_id', $reg_id)->first();    
@endphp

@extends('layouts.sidebar')

@section('content')


{{-- @dd($application) --}}
@php($user = Auth::user())

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Preview</h1>
                        <div class="page-header-subtitle">
                            Please check your deatils carefully.
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

        
            
            <form method="POST" action="{{route('application.step6.store')}}">
                @csrf

                {{-- {{$application->reg_id}} --}}

                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="agree1" value="yes" id="gridCheck" required="">
                      <label class="form-check-label" for="gridCheck">
                        I hereby declare that all the above information is true to the best of my knowledge.
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="agree2" value="yes" id="gridCheck" required="">
                      <label class="form-check-label" for="gridCheck">
                        I hereby declare that I am fit in all repects to meet all the requirements of the course.
                      </label>
                    </div>
                  </div>

                  <div class="form-row justify-content-end mt-3">
                    <div class="col-sm-6 text-right">
                        <button type="submit" name="action" value="edit" class="btn btn-primary btn-lg mr-3">Edit</button>
                        <button type="submit" name="action" value="save" class="btn btn-success btn-lg">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection