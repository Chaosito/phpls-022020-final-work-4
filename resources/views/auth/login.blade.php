@extends('layouts.gameshop')

@section('title', __('auth.Login'))
@section('content-top', '')


@section('content-main')
    <div class="content-main__container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="products-columns">
                <table class="table-custom-form">
                    <tbody>
                    <tr>
                        <td>{{ __('E-Mail Address') }}</td>
                        <td>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <div class="inline-error">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Password') }}</td>
                        <td>
                            <input id="password" type="password" name="password" required autocomplete="current-password" />
                            @error('password')
                            <div class="inline-error">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="width:100%;margin-top:30px;">
                    <button type="submit" class="btn">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a style="color:black; text-decoration: none;" href="{{ route('password.request') }}">
                            {{ __('Reset Password') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <div class="content-footer__container"></div>
@endsection
