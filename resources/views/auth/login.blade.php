@extends('layouts.app')

@section('content')
    <div class=" login">

    <div class="content">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{asset('../assets/pages/img/Path 1420.png')}}">
            </a>
        </div>
        @isset($url)
            <form method="POST" action='{{ url("admin/login") }}' aria-label="{{ __('Login') }}">
                @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @endisset
                        @csrf
                        <h3 class="form-title  font-green">Login</h3>
                        <div class="form-group">
                            <label for="email" class="control-label visible-ie8 visible-ie9">{{ __('E-Mail Address') }}</label>
                            <input class="form-control form-control-solid placeholder-no-fix" id="email" type="email"
                                   placeholder="email" class="@error('name') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <input class="form-control form-control-solid placeholder-no-fix" id="password"
                                   type="password" placeholder="password" class="@error('password') is-invalid
                                   @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn green uppercase">Login</button>
                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />Remember
                            </label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" id="forget-password" class="forget-password">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="create-account">
                            <p>
                                <a href="{{ route('register') }}" id="register-btn" class="uppercase">Create an account</a>
                            </p>
                        </div>
                    </form>
    </div>
</div>
@endsection
