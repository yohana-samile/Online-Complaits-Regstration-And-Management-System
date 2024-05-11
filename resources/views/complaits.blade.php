@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-glass">
            <div class="card-header">
                <div class="row">
                    <div class="float-left col-md-6">
                        <h4 class="text-capitalize">complaits submitted</h4>
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
                <table class="table table-hover table-bordered text-capitalize">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>complait</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>complait</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($complaits as $complait)
                            @php
                                $sn = 1;
                            @endphp
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $complait->complait_submitted }}</td>
                                <td>
                                    @if ($complait->status == "unprocessed")
                                        <div class="badge badge-danger">{{ $complait->status }}</div>
                                    @else
                                        <div class="badge badge-primary">{{ $complait->status }}</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ url('view_complaint', ['id' => $complait->id]) }}"><i class="fa fa-eye text-primary"></i></a>
                                        </div>
                                        @if ($complait->status == "unprocessed")
                                            <div class="col-md-6">
                                                <form action="{{ route('update_complait', ['id'=>$complait->id])}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" id="status" value="processed">
                                                    <button type="submit" class="btn btn-success btn-sm">Solved</button>
                                                </form>
                                            </div>
                                        @endif
                                        <div class="col-md-3">
                                            <form action="{{ route('destroy_complait', ['id'=>$complait->id])}}" method="POST">
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
