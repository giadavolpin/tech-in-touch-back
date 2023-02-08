@extends('layouts.app')

@section('content')
    <div class="dev_register_full_page">
        <div class="box_register">

            <form method="POST" action="{{ route('register') }}" class="dev_register_form">
                
                @csrf

                <h2>{{ __('Register') }}</h2>

                <div class="inputBox_register">
                    {{-- <label for="name">{{ __('Name') }}</label> --}}
                    <input id="name" type="text"
                    class="@error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <span>Nome</span>
                    <i></i>
                </div>

                <div class="inputBox_register">
                    {{-- <label for="surname">{{ __('Surname') }}</label> --}}
                    <input id="surname" type="text"
                        class="@error('surname') is-invalid @enderror" name="surname"
                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <span>Cognome</span>
                    <i></i>
                </div>

                <div class="inputBox_register">
                    {{-- <label for="address">{{ __('Address') }}</label> --}}
                    <input id="address" type="text"
                        class="@error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <span>Indizizzo</span>
                    <i></i>
                </div>

                <div class="inputBox_register">
                    {{-- <label for="email">{{ __('E-Mail Address') }}</label> --}}
                    <input id="email" type="email"
                        class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <span>Email</span>
                    <i></i>
                </div>

                <div class="inputBox_register">
                    {{-- <label for="password">{{ __('Password') }}</label> --}}
                    <input id="password" type="password"
                        class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   
                    <span>Password</span>
                    <i></i>
                </div>

                <div class="inputBox_register">
                    {{-- <label for="password-confirm">{{ __('Confirm Password') }}</label> --}}
                    <input id="password-confirm" type="password"
                        name="password_confirmation" required autocomplete="new-password">

                    <span>Conferma Password</span>
                    <i></i>
                </div>

                <div class="links_register">
                    <span>Sei già registrato ?</span>
                    <a href="#">Accedi</a>
                </div>
                
                <button type="submit" class="register">
                    {{ __('Registrati') }}
                </button>
                    
                </div>
            </form>   
        </div>
    </div>
@endsection
