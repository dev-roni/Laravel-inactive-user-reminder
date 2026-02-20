@extends('layouts')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Inactive Users</h5>
                <h2>{{ $inactiveUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Reminders Sent Today</h5>
                <h2>{{ $remindersToday }}</h2>
            </div>
        </div>
    </div>

</div>

@endsection