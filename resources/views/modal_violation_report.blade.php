<div class="button-wrapper">
  <button type="button" class="violation-report-button" data-toggle="modal" data-target="#violationReportModal">違反通報</button>
</div>

<!-- モーダル・ダイヤログ -->
<div class="modal" id="violationReportModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg violation-report-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">違反投稿通報</h4>
        <button type="button" class="btn-close" data-dismiss="modal"><span></span></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('violation.report') }}" id="violation-form">
          @csrf
          <input type="hidden" name="advice_id" value="{{ $user_advice->id }}">
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <div class="title-name">違反投稿タイトル</div>
          <div class="violation-title">{{ $user_advice->title }}</div>
          <input type="hidden" name="title" value="{{ $user_advice->title }}">
          <div class="advice-name">違反投稿内容</div>
          <div class="violation-advice">{{ $user_advice->advice }}</div>
          <input type="hidden" name="advice" value="{{ $user_advice->advice }}">
          <div class="violation-report"><label for="reason" class="report-title">違反理由をご記入下さい。</label></div>
          <div class="violation-report-area">
          <textarea name="reason" id="reason"></textarea>
        </form>
      </div>  
      </div>
      <div class="modal-footer">
        <button class="violation-button" type="submit" form="violation-form">通報</button>
        <button type="button" class="cancelBtn" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>