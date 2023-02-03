@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('form.send') }}">
  @csrf
  <div class="contact-form-container">
    <div class="form-top-space"></div>
    <div class="contact-form-wrapper">
      <h1 class="form-top-title">入力内容確認</h1>
      <div class="user-name-area">
        <h4 class="user-name-top">お名前</h4>
        <h4 class="user-name-under1">{{ $inputs['name'] }}</h4>
        <input type="hidden" name="name" value="{{ $inputs['name'] }}" class="user-name-under"></input>
      </div>
      <div class="user-email-area">
        <h4 class="user-email-top">メールアドレス</h4>
        <h4 class="user-email-under1">{{ $inputs['email'] }}</h4>
        <input type="hidden" name="email" value="{{ $inputs['email'] }}" class="user-email-under">
      </div>
      <div class="contact-form-area">
        <h4 class="contact-form-title">タイトル</h4>
        <h4 class="contact-form-content1">{{ $inputs['title'] }}</h4>
        <input type="hidden" name="title" value="{{ $inputs['title'] }}" class="contact-form-content">
      </div>
      <div class="contact-content-area">
        <h4 class="contact-content">お問い合わせ内容</h4>
        <h4 class="contact-content1">{!! nl2br(e($inputs['body'])) !!}</h4>
        <input type="hidden" name="body" value="{{ $inputs['body'] }}">
      </div>
      <div class="form-btn-area">
        <button type="submit" name="action" value="back" class="contact-form-cancel">入力内容修正</button>
        <button type="submit" name="action" value="submit" class="contact-form-btn1">送信</button>
      </div>
    </div>
    <div class="form-under-space"></div>
  </div>
</form>
@endsection