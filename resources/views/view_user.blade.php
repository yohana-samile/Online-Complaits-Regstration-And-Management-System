@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-glass">
            <div class="card-body">
                <p>Staff Name: {{ $user->name}}</p>
                <p>Staff Email: {{ $user->email}}</p>
                <p>Date Registered: {{ $user->created_at}}</p>
                <p>Date Records Updated: {{ $user->updated_at}}</p>
            </div>
        </div>
    </div>
@endsection
