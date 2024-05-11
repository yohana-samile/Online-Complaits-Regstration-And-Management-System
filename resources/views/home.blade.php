@extends('layouts.app')
@section('content')
@php
    use Illuminate\Support\Facades\DB;
    $new_complaits = DB::select("SELECT COUNT(id) as count FROM `complaits` WHERE status = 'unprocessed' ");
    $proccessed_complaits = DB::select("SELECT COUNT(id) as count FROM `complaits` WHERE status = 'processed' ");
    $new_complaits = $new_complaits[0]->count ?? 0;
    $proccessed_complaits = $proccessed_complaits[0]->count ?? 0;
@endphp
<div class="container">
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card" style="border-left: 5px solid rgba(213, 94, 28, .9);">
                <div class="card-body text-center">
                    <h4 class="text-center">New Complaits Submitted</h4>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <h4>{{ $new_complaits }}</h4>
                        </div>
                        <div class="col-md-6">
                            <i class="fa fa-recycle fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border-left: 5px solid rgba(213, 94, 28, .9);">
                <div class="card-body text-center">
                    <h4 class="text-center">Proccessed Complaits</h4>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <h4>{{ $proccessed_complaits }}</h4>
                        </div>
                        <div class="col-md-6">
                            <i class="fa fa-check fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
