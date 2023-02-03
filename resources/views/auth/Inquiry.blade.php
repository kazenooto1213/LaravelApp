@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('form.confirm') }}">
  @csrf
  <div class="contact-form-container">
    <div class="form-top-space"></div>
    <div class="contact-form-wrapper">
      @if($errors->has('email'))
      <p class="error-message1">{{ $errors->first('email') }}</p>
      @endif
      @if($errors->has('body'))
      <p class="error-message1">{{ $errors->first('body') }}</p>
      @endif
      @if($errors->has('title'))
        <p class="error-message1">{{ $errors->first('title') }}</p>
      @endif
      <h1 class="form-top-title">お問い合わせフォーム</h1>
      <div class="user-name-area">
        <h4 class="user-name-top">お名前</h4>
        <input type="text" name="name" value="{{ $name->name }}" class="user-name-under"></input>
      </div>
      <div class="user-email-area">
        <h4 class="user-email-top">メールアドレス</h4>
        <input type="text" name="email" value="{{ old('email') }}" class="user-email-under">
      </div>
      <div class="contact-form-area">
        <h4 class="contact-form-title">タイトル</h4>
        <input type="text" name="title" value="{{ old('title') }}" class="contact-form-content">
      </div>
      <div class="contact-content-area">
        <h4 class="contact-content">お問い合わせ内容</h4>
        <textarea name="body" class="contact-textarea">{{ old('body') }}</textarea>
      </div>
      <button type="submit" class="contact-form-btn">入力内容確認</button>
    </div>
  </div>
  <div class="form-under-space"></div>
</form>
@endsection