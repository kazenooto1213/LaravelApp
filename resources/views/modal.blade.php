<!-- 出費登録モーダル・ダイヤログ -->
<form id="dayclick" method="post" action="{{ route('store') }}">
  @csrf
  <div class="modal" id="registerExpenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">出費登録</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"><span></span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit_id" value="">
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <div class="category-wrapper">
            <p class="expense-category">家計簿項目：</p>
            <select name="expense_category" class="expense-select">
              @foreach($expense_category as $expense)
              <option value="{{ $expense->category }}">{{ $expense->category }}</option>
              @endforeach
            </select>
          </div>
          <p class="expense-category">出費：<input type="text" name="expense" placeholder="金額を記入して下さい。"></p>
          <p class="expense-day">日付選択：<input id="start" type="date" name="start"></p>
          <div class="category-color">
            <p class="color-title">カテゴリー色：</p>
            <p class="color"><input type="color" name="color"></p>
          </div>
          <div class="title-color">
            <p class="text-color-title">文字色：</p>
            <p class="text-color"><input type="color" name="text_color"></p>
          </div>
        </div>
</form>
<div class="modal-footer">
  <button class="register-expense" type="submit" form="dayclick">登録</button>
  <button type="button" class="cancelBtn" data-bs-dismiss="modal">キャンセル</button>
</div>
</div>
</div>