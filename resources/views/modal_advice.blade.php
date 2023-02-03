<div class="advice-menu-container">
  <button type="button" class="menuBtn" data-toggle="modal" data-target="#Modal" data-id="{{ $advice->id }}" data-title="{{ $advice->title }}" data-content="{{ $advice->advice }}">編集&nbsp;&nbsp;&nbsp;削除</button>
</div>
<!-- モーダル・ダイヤログ -->
<div class="modal" id="Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">投稿内容の編集・削除</h4>
        <button type="button" class="btn-close" data-dismiss="modal"><span></span></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('advice.edit') }}" id="modal-form">
          @csrf
          <input id="advice_id" type="hidden" name="id" value="{{ $advice->id }}">
          <label class="advice-title-area">タイトル</label>
          <input type="text" id="advice_title" class="form-control" name="title">
          <label class="advice-content-area">内容</label>
          <textarea name="advice" id="advice_content" class="form-control"></textarea>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" id="updateBtn" class="adviceEditBtn" name="update" form="modal-form">編集</button>
        <button type="submit" id="btn1" class="adviceDeleteBtn" name="delete" form="modal-form">削除</button>
        <button type="button" class="cancelBtn" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>