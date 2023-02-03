// /calendar、登録ボタン用ダイヤログ
const targetBtn = document.querySelector('#targetBtn');
const dialog = document.querySelector('#dialog');
const modal = document.getElementById('#targetRegisterModal');

// 登録ボタン、クリックでダイヤログ表示
$(function(){
  $(targetBtn).click(function() {
    $('#targetRegisterModal').modal('show');
  });
});

// /calendar、編集ボタン用ダイヤログ
const editBtn = document.querySelector('#editBtn');
const dialog1 = document.querySelector('#dialog1');
const editModal = document.getElementById('#targetEditModal');

// 編集ボタン、クリックでダイヤログ表示
$(function(){
  $(editBtn).click(function() {
    $('#targetEditModal').modal('show');
  });
});

// /calendar、削除ボタン用ダイヤログ
const deleteBtn = document.querySelector('#deleteBtn');
const dialog2 = document.querySelector('#dialog2');
const deleteModal = document.getElementById('#targetDeleteModal');

// 削除ボタン、クリックでダイヤログ表示
$(function(){
  $(deleteBtn).click(function() {
    $('#targetDeleteModal').modal('show');
  });
});

