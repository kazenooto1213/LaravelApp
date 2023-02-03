@extends('layouts.app')

@section('content')
<div class="login-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="login-title">ログイン</h3>
                    @if(session('warning'))
                    <div class="alert delete-user">
                        {{ session('warning') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="mail-title col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="password-title col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div id="check" class="form-check">
                                        <input id="check" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-title form-check-label" for="remember">
                                            {{ __('ログイン状態を保存する') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ログイン') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                    <div class="a-title">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('パスワードをお忘れですか？') }}
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cat">
        <h1 class="cat-title">今日も一日、お疲れ様でした！<br>家計簿、頑張るニャ♪</h1>
    </div>
    </div>
    <br>
    <br>
    <br>
    
    @endsection