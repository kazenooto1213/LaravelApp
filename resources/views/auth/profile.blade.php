@extends('layouts.app')

@section('content')
<div class="profile-are">
  <div class="top-container">
    <a href="{{ url('/calendar') }}" class="return-calendar">
      <div id="back-arrow"></div>家計簿
    </a>
  </div>
  <div class="profile-card">
    <h2 class="profile-card1">プロフィール情報</h2>
    <div class="icon"><img src="{{ asset('img/profile-icon.png') }}" class="profile-icon"></div>
    <div class="profile-card2">
      <p class="profile-card3">ログインユーザー名:</p>
      <p class="profile-card4">{{ Auth::user()->name }}</p>
    </div>
    <a href="{{ url('/user/contact') }}" class="contact-link">お問い合わせフォーム</a>
    <div class="profile-card5">
        <form method="POST" action="{{ route('user.delete')}}" id="user-destroy">
          @csrf
          @method('DELETE')
          @include('modal_profile')
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="{{ asset('/js/menu.js') }}"></script>
@endsection