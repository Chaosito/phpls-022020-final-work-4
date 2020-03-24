@extends('layouts.gameshop')

@section('title', __('auth.Register'))
@section('content-top', '')

@section('content-main')
    <div class="content-main__container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="products-columns">
                <table class="table-custom-form">
                    <tbody>
                    <tr>
                        <td>{{ __('Name') }}</td>
                        <td>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="inline-error">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('E-Mail Address') }}</td>
                        <td>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <div class="inline-error">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Password') }}</td>
                        <td>
                            <input id="password" type="password" name="password" required autocomplete="new-password">
                            @error('password')
                            <div class="inline-error">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('Confirm Password') }}</td>
                        <td>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input id="is-admin" type="checkbox" class="form-control" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                IsAdmin
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="width:100%;margin-top:30px;">
                    <button type="submit" class="btn">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="content-footer__container"></div>
@endsection
