@extends('layouts')

@section('content')

<h2 class="mb-4">System Settings</h2>

<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-body">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('settings.store') }}">
            @csrf

            <!-- Inactive Days -->
            <div class="mb-3">
                <label class="form-label">Inactive Days</label>

                <input type="number"
                       name="inactive_days"
                       class="form-control @error('inactive_days') is-invalid @enderror"
                       value="{{ old('inactive_days', $settings->inactive_days ?? '') }}">

                @error('inactive_days')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Paid User Message -->
            <div class="mb-3">
                <label class="form-label">Paid User Reminder Message</label>

                <textarea name="paid_user_message"
                          class="form-control @error('paid_user_message') is-invalid @enderror"
                          rows="3">{{ old('paid_user_message', $settings->paid_user_message ?? '') }}</textarea>

                @error('paid_user_message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- General User Message -->
            <div class="mb-3">
                <label class="form-label">Not Paid User Reminder Message</label>

                <textarea name="general_user_message"
                          class="form-control @error('general_user_message') is-invalid @enderror"
                          rows="3">{{ old('general_user_message', $settings->general_user_message ?? '') }}</textarea>

                @error('general_user_message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary">
                Save Settings
            </button>

        </form>

    </div>
</div>

@endsection