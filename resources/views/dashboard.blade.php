@extends('layouts')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers}}</h2>
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

    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="text-success"> Users
                </h2>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header bg-success text-white py-3 d-flex justify-content-between">
                <h5 class="card-title mb-0">Recent Reminders List</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-success">
                            <tr class="text-center">
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Last Login</th>
                                <th scope="col" class="text-center">Reminder sent at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentReminders as $reminder)
                                <tr class="text-center">
                                    <td data-label="Id">{{$loop->iteration + ($recentReminders->currentPage() - 1) * $recentReminders->perPage()}}</td>
                                    <td data-label="Name">{{ $reminder->user->name }}</td>
                                    <td data-label="Phone">{{ $reminder->user->phone }}</td>
                                    <td data-label="Email">{{ $reminder->user->email }}</td>
                                    <td data-label="User Type">{{ $reminder->user->user_type }}</td>
                                    <td data-label="Last Login">{{ $reminder->user->last_login_at }}</td>
                                    <td data-label="Last Login">{{ $reminder->reminder_sent_at }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No Reminder found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        {{ $recentReminders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection