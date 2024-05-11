@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-6">
                <div class="card rounded-3">
                    <div class="card-body">
                        <h5 class="text-center">Update Staff</h5>
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
                        <form method="POST" action="{{ route('update_edit_user') }}">
                            @csrf

                            <div class="mb-3">
                                <input id="name" type="hidden" value="{{ $user->id }}" class="form-control" name="id" value="{{ old('name') }}" required>
                                <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name" class="ol-form-label text-md-end">{{ __('Enter Staff Name') }}</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <small>You Are Not Allowed To update emaly dut to security reasons</small>
                            </div>

                            <div class="mb-0">
                                <div class="offset-md-4">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-sm float-right">Update Record</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
