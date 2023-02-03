@extends('layouts.app')

@section('content')
<div class="container-total-area">
  <div class="top-container">
    <a href="{{ url('/calendar') }}" class="return-calendar">
      <div id="back-arrow"></div>家計簿
    </a>
  </div>
  <div class="total-area">
    <form method="get" action="{{ route('total') }}">
      @csrf
      <div class="expense-select-area">
        <select type="search" name="yyyy" class="year" value="yyyy">
          @foreach($years as $year)
          <option value="{{ $year }}">{{ $year }}</option>
          @endforeach
        </select>
        <select type="search" name="mm" class="mm" value="mm">
          @foreach($months as $month)
          <option value="{{ $month }}">{{ $month }}</option>
          @endforeach
        </select>
        <button type="submit" class="expense-search">表示</button>
      </div>
    </form>
    <div class="total-area-container">
      <article class="total-area-left">
        <div class="total-area-target">目標設定</div>
        @foreach($targets as $target)
        <div class="total-area-wrapper">
          <div class="total-area-left1">家計簿目標：{{ $target->target_category }}</div>
          <div class="total-area-left2">&emsp;設定金額：￥{{ number_format($target->target) }}</div>
        </div>
        @endforeach
      </article>
      <article class="total-area-right">
        <div class="total-area-price">今月総出費</div>
        @foreach($totals as $total)
        <div class="total-area-wrapper1">
          <div class="total-area-right1">{{ $total->expense_category }}</div>
          <div class="total-area-right2">￥{{ number_format($total->total_expense) }}</div>
        </div>
        @endforeach
        <div class="total-expense-wrapper">
          <div class="total-expense-title">出費合計</div>
          <div class="total-expense-area">￥{{ number_format($total_expense) }}</div>
        </div>
      </article>
    </div>
    <div class="expense-sort-wrapper">
      <article class="expense-sort-left">
        <div class="expense-sort-title">出費降順</div>
        <div class="expense-sort-container">
          <div class="expense-sort-left1">
            @foreach($sort_expense as $expense)
            <p>{{ $expense->expense_category }}</p>
            @endforeach
          </div>
          <div class="expense-sort-left2">
            @foreach($sort_expense as $expense)
            <p>￥{{ number_format($expense->total_expense) }}</p>
            @endforeach
          </div>
        </div>
      </article>
      <article class="expense-sort-right">
        <canvas id="myChart-sidebar" style="width:100%; height: 350px;"></canvas>
      </article>
    </div>
    <article class="expense-sort-circle">
      <div class="expense-sort-title1">円グラフ</div>
    </article>
    <article class="circle-container">
    <div class="circle-area">
      <canvas id="myChart-circle"></canvas>
    </div>
    <div class="circle-right">
      @foreach($sort_expense as $expense)
      <ul class="circle-ul">
        <li class="calculation-category">{{ $expense->expense_category }}</li>
        <li class="calculation-expense">￥{{ number_format($expense->total_expense) }}</li>
        <li class="calculation-percent">({{ round($expense->total_expense / $total_expense * 100, 1) }}%)</li>
      </ul>
      @endforeach
    </div>
    </article>
  </div>
  <div class="space"></div>
</div>
<script>
  const expenses = {{ Js::from($expenses) }};
</script>
<!-- JavaScript jQuery -->
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<!-- JavaScript chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- JavaScript ハンバーガーメニュー -->
<script src="{{ asset('/js/menu.js') }}"></script>
<!-- JavaScript チャート -->
<script src="{{ asset('/js/chart_sidebar.js') }}"></script>
<script src="{{ asset('/js/chart_circle.js') }}"></script>
@endsection