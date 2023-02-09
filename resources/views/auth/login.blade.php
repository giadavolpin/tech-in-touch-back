@extends('layouts.app')

@section('content')
<div class="dev_login_full_page">
    <div class="box_login">
        
        <form method="POST" action="{{ route('login') }}" class="form_login" id="login-form">
            @csrf
            
            <h2>{{ __('Login') }} <i class="fa-solid fa-arrow-right-to-bracket"></i></h2>

            <div class="inputBox_login">
                {{-- <label for="email">{{ __('E-Mail Address') }}</label> --}}
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="dev_error_login" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                <span class="label">Email</span>
                {{-- <i></i> --}}
            </div>

            <div class="inputBox_login">
                {{-- <label for="password">{{ __('Password') }}</label> --}}
                <input autocomplete="new-password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="dev_error_login" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
               
                <span class="label">Password</span>
                {{-- <i></i> --}}
            </div>

            <div class="links_login">
                <span>Non hai ancora un account ?</span>
                <a href="http://127.0.0.1:8000/register">Registrati</a>
            </div>
            <button type="submit" class="btn_login">{{ __('Login') }}</button>
{{-- 
            <div class="mb-4 row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="mb-4 row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div> --}}
        </form>
    </div>
</div>



@endsection

