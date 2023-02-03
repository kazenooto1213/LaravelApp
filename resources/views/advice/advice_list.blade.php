@extends('layouts.app')

@section('content')
<div class="list-advice">
  <div class="top-container">
    <a href="{{ url('/calendar') }}" class="return-calendar">
      <div id="back-arrow"></div>家計簿
    </a>
  </div>
  <div class="list-area">
    <div class="list-top-container">
      <article class="list-left">
        <form class="row g-1" action="{{ route('list') }}">
          @csrf
          <div class="col-auto">
            <input type="search" name="search" class="form-control1" placeholder="投稿検索" value="@if(isset($search)) {{ $search }} @endif">
          </div>
          <div class="col-auto">
            <button type="submit" class="searchBtn"><img src="{{ asset('/img/advice-search.png') }}" class="advice-search"></img></button>
          </div>
        </form>
      </article>
      <article class="list-center">
        <div class="center1">
          <h2 class="center-title">投稿一覧</h2>
        </div>
      </article>
      <article class="list-right">
      </article>
    </div>
    <div class="list-top-are">
      <h2 class="list-top-title">カテゴリー</h2>
    </div>
    <div class="category-list">
      @foreach($categorys as $category)
      <ul class="category-list-ul">
        <li class="category-list-li"><a href="{{ route('list', ['category' => $category->id]) }}" class="category-list-a">{{ $category->category }}</a></li>
      </ul>
      @endforeach
    </div>
    <div class="list-middle">
      <h2 class="middle-title">投稿タイトル</h2>
      @if ($sort_category !== null)
      <a href="{{ route('list') }}" class="sort-list-tag">トップ</a> > <a href="#" class="sort-list-tag1">{{ $sort_category->category }}</a>
      <h3 class="sort-list-title">{{ $sort_category->category }}の投稿一覧{{ $total_count }}件</h3>
      @endif
    </div>
    <div class="advice-list">
      @foreach($advices as $advice)
      <ul class="advice-list-ul">
        <li><a href="{{ route('user.advice',['advice' => $advice->id]) }}" class="advice-list-a" name="advice">{{ $advice->title }}</a></li>
      </ul>
      @endforeach
    </div>
  </div>
  <div class="pagination">
    {{ $advices->appends(request()->input())->links() }}
  </div>
  <div class="under-space"></div>
</div>
<script src="{{ asset('/js/menu.js') }}"></script>
@endsection