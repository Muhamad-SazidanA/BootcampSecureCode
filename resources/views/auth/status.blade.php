@extends('layouts.app')

@section('title', 'Login Status')

@section('content')
    <div class="container py-4">
        <h1 class="h4 mb-3">Login Status (Secure)</h1>

        @if ($isSecure ?? false)
            <div class="alert alert-success">Secure authentication flow is active.</div>
        @endif

        <div class="card">
            <div class="card-header">Recent Login Attempts</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>IP Address</th>
                                <th>Successful</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($attempts ?? collect()) as $attempt)
                                <tr>
                                    <td>{{ $attempt->email }}</td>
                                    <td>{{ $attempt->ip_address }}</td>
                                    <td>{{ $attempt->successful ? 'Yes' : 'No' }}</td>
                                    <td>{{ $attempt->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No login attempts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
