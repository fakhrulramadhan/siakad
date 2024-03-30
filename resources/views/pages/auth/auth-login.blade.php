@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>FIC 8 - Login Siakad</h4>
        </div>

        {{-- action = dia mengarah ke mana --}}
        <div class="card-body">
            <form method="POST"
                action="{{ route('login')}}"
                class="needs-validation"
                novalidate="">
                {{-- aman dari csrf --}}
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    {{-- @error = untuk memunculkan pesan error --}}
                    <input id="email"
                        type="email"
                        class="form-control @error('email') is-invalid

                        @enderror"
                        name="email"
                        tabindex="1"

                        autofocus>

                       {{-- tampil pesan errornya --}}
                       @error('email')
                       <div class="invalid-feedback">
                           {{-- Please fill in your email --}}
                           {{  $message    }}
                       </div>
                       @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password"
                            class="control-label">Password</label>
                        <div class="float-right">
                            <a href="auth-forgot-password.html"
                                class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <input id="password"
                        type="password"
                        class="form-control @error('password') is-invalid

                        @enderror"
                        name="password"
                        tabindex="2">
                     {{-- tampil pesan errornya --}}
                   @error('password')
                   <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                   @enderror
                </div>



                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Login
                    </button>
                </div>
            </form>


        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Don't have an account? <a href="{{ route('register') }}">Create One</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
