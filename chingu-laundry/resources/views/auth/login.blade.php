@extends('layouts.guest')

@section('content')
<div class="card shadow-sm border-0" style="border-radius: 15px;">
    <div class="card-header bg-white text-center py-4 border-0" style="border-radius: 15px 15px 0 0;">
        <h4 class="mb-0 fw-bold" style="color: #179BAE;">Login Admin</h4>
        <small class="text-muted">Admin Silahkan Login</small>
    </div>

    <div class="card-body px-4 pb-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@gmail.com" style="padding: 10px;">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••" style="padding: 10px;">
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-muted" for="remember">
                    Remember Me
                </label>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn text-white fw-bold" style="background-color: #179BAE; padding: 10px; border-radius: 8px;">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection