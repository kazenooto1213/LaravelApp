@extends('layouts.app')

@section('content')
<div class="list-advice">
  <div class="message-area"></div>
  @if(session('message'))
  <div class="alert-area1">
    <div class="alert alert-success">{{session('message')}}</div>
  </div>
  @endif
  <div class="top-space">
    <div class="top-container">
      <a href="{{ url('/calendar') }}" class="return-calendar">
        <div id="back-arrow"></div>家計簿
      </a>
    </div>
  </div>
  <div class="advice-back-container">
    <div class="title-container">投稿内容</div>
    <div class="title">{{ $user_advice->title }}</div>
    <div class="advice">
      {{ $user_advice->advice }}
    </div>
    <div class="count-gratitude">
      <img src="{{ asset('img/gratitude.png') }}" alt="感謝" class="gratitude-icon">
      <label class="count-label">感謝{{ $total_gratitude->count() }}</label>
    </div>
    <div class="gratitude-container">
      <div class="register-gratitude">
        <form method="post" action="{{ route('gratitude.store') }}">
          @csrf
          @if($user_advice->user_id !== Auth::id() && empty($gratitude))
          <input type="hidden" name="advice_id" value="{{ $user_advice->id }}">
          <h3 class="gratitude">投稿に感謝を伝える</h3>
          <button type="submit" class="gratitude-button">感謝を送る</button>
          @endif
        </form>
      </div>
      <div class="delete-gratitude">
        <form method="post" action="{{ route('gratitude.destroy') }}">
          @csrf
          @method('DELETE')
          @foreach($data as $value)
          @if(!empty($gratitude))
          <input type="hidden" name="id" value="{{ $value->id }}">
          <h3 class="gratitude">投稿への感謝を外す</h3>
          <button type="submit" class="gratitude-button1">感謝を外す</button>
          @endif
          @endforeach
        </form>
      </div>
      @include('modal_violation_report')
    </div>
  </div>
</div>
<div class="under-space"></div>
<script src="{{ asset('/js/menu.js') }}"></script>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>