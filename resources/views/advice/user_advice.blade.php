@extends('layouts.app')

@section('content')
<div class="advice-area">
  <div class="top-container">
    <a href="{{ url('/calendar') }}" class="return-calendar">
      <div id="back-arrow"></div>家計簿
    </a>
  </div>
  @if(session('message'))
  <div class="alert-area">
    <div class="alert alert-success">{{session('message')}}</div>
  </div>
  @endif
  <table class="advice-list-header">
    <th class="advice-category">カテゴリー</th>
    <th class="advice-title">タイトル</th>
    <th class="advice-content">内容</th>
    <th class="advice-gratitude">感謝</th>
    <th class="advice-menu">メニュー</th>
    @foreach($advices as $advice)
    <tr>
      @foreach($advice_category as $category)
      @if($advice->category == $category->id)
      <td class="category-number">{{ $category->category }}</td>
      @endif
      @endforeach
      <td class="title-area">{{ $advice->title }}</td>
      <td class="content-area">{{ $advice->advice }}</td>
      <td class="gratitude-area"><img src="{{ asset('img/gratitude.png') }}" class="gratitude-icon1">&nbsp;&nbsp;{{ $advice->gratitudes->count() }}</td>
      <td class="menu-area">
        @include('modal_advice')
      </td>
      @endforeach
    </tr>
  </table>
  <div class="pagination">
    {{ $advices->links() }}
  </div>
</div>
<div class="advice-under-space"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/modal.js') }}"></script>
<!-- JavaScript jQuery -->
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- JavaScript ハンバーガーメニュー -->
<script src="{{ asset('/js/menu.js') }}"></script>
@endsection