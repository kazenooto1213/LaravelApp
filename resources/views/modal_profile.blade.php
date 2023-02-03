<div class="advice-menu-container">
  <button type="button" class="profileBtn" data-toggle="modal" data-target="#advicePostModal">アカウント削除</button>
</div>
<!-- モーダル・ダイヤログ -->
<div class="modal" id="advicePostModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg user-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">アカウント削除の確認</h4>
        <button type="button" class="btn-close" data-dismiss="modal"><span></span></button>
      </div>
      <div class="modal-body">
      <p class="danger-title">本当にアカウントを削除してよろしいですか？<br>（データはすべて削除され復旧は出来ません。）</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="_method" value="DELETE">
        <button id="profileDeleteBtn" type="submit" form="user-destroy">削除</button>
        <button type="button" class="cancelBtn" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>