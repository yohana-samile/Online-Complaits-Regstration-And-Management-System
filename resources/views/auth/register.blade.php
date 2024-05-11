@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-6">
                <div class="card rounded-3">
                    <div class="card-body">
                        <h5 class="text-center">Staff User Registration</h5>
                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('/auth/store') }}">
                            @csrf

                            <div class="mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name" class="text-md-end">{{ __('Enter Staff Name') }}</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="mb-0">
                                <div class="offset-md-4">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btnSuccess btn-lg mb-1 push-right">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
