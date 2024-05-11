@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-glass">
            <div class="card-header">
                <div class="row">
                    <div class="float-left col-md-6">
                        <h4>Companies Registered</h4>
                    </div>
                    <div class="float-right col-md-6">
                        <a href="{{ url('auth/register')}}" class="btn primaryColor text-white text-center float-right">Register New Staff <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                <table class="table table-hover table-bordered">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            @php
                                $sn = 1;
                            @endphp
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td class="text-capitalize">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ url('view_user', ['id' => $user->id]) }}"><i class="fa fa-eye text-primary"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ url('edit_user', ['id' => $user->id]) }}"><i class="fa fa-edit text-success"></i></a>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="{{ route('destroy_user', ['id'=>$user->id])}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-white text-white"><i class="fa fa-trash text-danger"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
