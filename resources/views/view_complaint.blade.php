@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-glass">
            <div class="card-body">
                <p>Complait Submitted: {{ $complait->complait_submitted}}</p>
                <p>Date Submitted: {{ $complait->created_at}}</p>
                <p>Date Updated: {{ $complait->updated_at}}</p>
                <p>
                    @if ($complait->status == "unprocessed")
                        Complait Status:<div class="badge badge-danger">{{ $complait->status }}</div>
                    @else
                        Complait Status:<div class="badge badge-primary">{{ $complait->status }}</div>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
