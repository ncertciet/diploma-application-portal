@php
$user = $user ?? null;
@endphp
@extends('layouts.sidebar')

@section('content')


    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-user mr-1"></i> Profile</h1>
                        <div class="page-header-subtitle">
                            Update your Profile details.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="inner-container container-xl">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header h4 text-primary">Profile Picture</div>

                        <div class="card-body">
                            Hello
                        </div>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-header h4 text-primary">Profile Details</div>
                        <div class="card-body">
                            <form action="{{ route('account.update') }}" method="POST" autocomplete="off">

                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror"" placeholder="Name" value="{{ $user->name ?? '' }}">
                                    </div>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email ID</label>
                                    <div class="col-sm-7">
                                        <input type="email" name="email" readonly id="email" class="form-control" placeholder="Email" value="{{ $user->email ?? '' }}">
                                        <small class="text-primary">You can not change your Email ID.</small>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="tel" class="col-md-4 col-form-label text-md-right">Mobile</label>
                                    <div class="col-sm-7">
                                        <input type="tel" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Email" value="{{ $user->mobile ?? '' }}">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        @if( $user )
                                            <p class="text-danger small mt-2">If you don't want to change password then leave it blank.</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-7">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
