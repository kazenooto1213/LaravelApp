@extends('layouts.app')

@section('content')
<div class="mail-container">
  <div class="form-top-space"></div>
  <div class="mail-send-area">
    <h4 class="mail-send-message">
      {{__('お問い合わせが送信完了しました。')}}
    </h4>
  </div>
  <div class="middle-space"></div>
  <div class="link-back-area">
    <a href="{{ route('set.events') }}" class="back-calendar">家計簿に戻る</a>
  </div>
</div>
@endsection