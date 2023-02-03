// 要素の取得
const $toggleBtn = document.querySelector('#toggle_btn');
const $menuArea = document.querySelector('#menu_area');
const $remove = [...document.querySelectorAll('.remove')];
const $span = [...document.querySelectorAll('span')];


// 各spanにクラスmenu_activeを付与する関数を定義
const spanGroup = () => {
  let spanIndex = 0;
  const spanLength = $span.length;
  while(spanIndex < spanLength){
    $span[spanIndex].classList.toggle('menu_active');
    spanIndex++;
  };
};

// ハンバーガーメニューボタンをクリックでクラス切り替え
$toggleBtn.addEventListener('click', () => {
  $menuArea.classList.toggle('menu_active');
  spanGroup();
});
  
$remove[0].addEventListener('click', () => {
  $menuArea.classList.toggle('menu_active');
  spanGroup();
});

$remove[1].addEventListener('click', () => {
  $menuArea.classList.toggle('menu_active');
  spanGroup();
});

$remove[2].addEventListener('click', () => {
  $menuArea.classList.toggle('menu_active');
  spanGroup();
});

$remove[3].addEventListener('click', () => {
  $menuArea.classList.toggle('menu_active');
  spanGroup();
});

$remove[4].addEventListener('click', () => {
  $menuArea.classList.toggle('menu_active');
  spanGroup();
});