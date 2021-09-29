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
                <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                    @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @endisset
                            @csrf
                            <h3 class="form-title  font-green">Register</h3>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">{{ __('Name') }}</label>
                                <input class="form-control form-control-solid placeholder-no-fix" id="name" type="text"
                                       placeholder="Name" @error('name') is-invalid @enderror name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail Address') }}</label>
                                <input class="form-control form-control-solid placeholder-no-fix" id="email"
                                       type="email" placeholder="email" @error('email') is-invalid
                                       @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Password</label>
                                <input class="form-control form-control-solid placeholder-no-fix" id="password"
                                       type="password" placeholder="password" @error('password') is-invalid
                                       @enderror name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label
                                    class="control-label visible-ie8 visible-ie9">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" placeholder="password_confirmation" required
                                       autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn green uppercase">{{ __('Register') }}</button>
                            </div>
                        </form>
        </div>
    </div>
@endsection
