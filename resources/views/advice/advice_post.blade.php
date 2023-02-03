@extends('layouts.app')

@section('content')
<div class="advice-area">
  <div class="top-container">
    <a href="{{ url('/calendar') }}" class="return-calendar">
      <div id="back-arrow"></div>家計簿
    </a>
    <a href="{{ url('/advice/user') }}" class="return-advice-list">
      <div id="return-advice-icon"></div>投稿確認
    </a>
  </div>
  <div class="middle-container">
    <article class="post-left">
      <div class="left">
        <h2 class="thank-you">私のアドバイスが<br>誰かの役に<br>立つといいなぁ</h2>
      </div>
      <div class="left-bottom">
        <div class="left1">
          <h2 class="thank-you1">新しい発見が<br>あるかもしれないよ!</h2>
        </div>
        <div class="item1"></div>
      </div>
    </article>
    <article class="post-area">
      @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
        <li class="error-message">{{ $error }}</li>
        @endforeach
      </ul>
      @endif
      @if(session('message'))
      <div class="alert-are alert-are1">
        <div class="alert alert-success">{{session('message')}}</div>
      </div>
      @endif
      <div class="post-table">
        <h2 class="post">アドバイス投稿</h2>
        <h2 class="post-category">カテゴリー</h2>
        <form method="post" action="{{ route('insert') }}" id="advice-form" enctype="multipart/form-data">
          @csrf
          <div class="category-area">
            @foreach($categorys as $category)
            <ul>
              <input type="hidden" name="user_id" value="{{ Auth::id()}}">
              <li class="category-li">{{ $category->category }}<input type="checkbox" class="category-box" name="category[]" value="{{ $category->id }}"><br></li>
            </ul>
            @endforeach
          </div>
          <h2 class="post-title">タイトル：<input type="text" name="title" placeholder="タイトルを記入して下さい。"></h2>
          <textarea name="advice" class="text-area"></textarea>
        </form>
        @include('modal_advice_post')
      </div>
    </article>
    <article class="post-right">
      <div class="right">
        <h2 class="thank-you3">私も<br>私も！</h2>
      </div>
      <div class="item2"></div>
      <div class="right1">
        <h2 class="thank-you4">色んな人の<br>アドバイス<br>今度、<br>試してみるんだ！</h2>
      </div>
    </article>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{ asset('/js/menu.js') }}"></script>
@endsection