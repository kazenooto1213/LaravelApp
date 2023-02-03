@extends('layouts.app')

@section('content')
<div class="explanation">
  <div class="ex-containar">
    <div class="subcontainer">
      <h1 class="explanation-title">家計簿をつけるだけに<br>なってしまっていませんか？</h1>
      <p class="subtitle">家計簿をつけながら<br>貯金、収支改善、家族旅行の準備金など<br><strong>目的を持って家計簿をつける事が出来ます。</strong></p>
    </div>
    <img src="{{ asset('img/家計簿をつける主婦.png') }}" class="housewife">
  </div>
  <hr class="hr1">
  <div class="box-problem">
    <h1 class="problem">こういった事でお困りではありませんか？</h1>
  </div>
  <section>
    <div class="area">
      <img src="{{ asset('img/woman.png') }}" class="woman">
      <p class="area-p">家計簿はちゃんとつけているんだけれど、つける事だけが習慣になってしまっている方<br>それだけでは勿体無い気がしませんか？</p>
    </div>
    <div class="area">
      <img src="{{ asset('img/man.png') }}" class="man">
      <p class="area-p">資格取得やキャリアアップを目指しているんだけど、日頃から家計簿をつけたりする習慣が無い方<br>個人的に資格を取ろうとすると<br>会社が負担してくれない場合もあって困ってしまいますよね？</p>
    </div>
    <div class="area">
      <img src="{{ asset('img/family.png') }}" class="family">
      <p class="area-p">家族旅行の計画やお子様の教育費などで貯金をしようと考えている方<br>一か月間で使用している収支について全部把握出来ていますでしょうか？</p>
    </div>
    <div class="area">
      <img src="{{ asset('img/middle_aged.png') }}" class="family">
      <p class="area-p">老後の生活に必要なお金について考えている方<br>実際に収支から対策は取れておりますでしょうか？</p>
    </div>
  </section>
  <hr class="move-hr">
  <br>
  <br>

  <div class="ex-wrapper">
    <h2 id="elm">お困りのそこの貴方に!<br>本アプリで家計簿について少しでも、<br>お役に立てると思いますので<br>本アプリのご提案を致します。</h2>
    <img src="{{ asset('img/提案する.png') }}" class="suggestion">
    <br>
    <div class="box-use">
      <h1 class="to-use">本アプリで出来る事</h1>
      <ul class="to-use1">
        <li>①：一日の収支を簡単に登録！</li>
        <li>②：月の最終日登録後<br>&emsp;&emsp;一か月の収支トータルを確認出来ます。</li>
        <li>③：収支から、何に沢山お金を使っているのか<br>&emsp;&emsp;割合で見る事が出来ます。</li>
        <li>④：利用されている皆様で、節約術等について<br>&emsp;&emsp;アドバイスを投稿出来ます。</li>
        <li>&emsp;<strong>※投資話や詐欺などに関わる投稿は禁止です！</strong><br>&emsp;&emsp;ユーザーの皆様で知恵を出し合う事で、<br>&emsp;&emsp;新たな気付きやお買い物をする際の節約術などを<br>&emsp;&emsp;共有して頂き、つける事だけが習慣になってしまっている<br>&emsp;&emsp;家計簿の付け方を有効に使って頂き、<br>&emsp;&emsp;<strong>目的を持って家計簿を付ける習慣に</strong>変えて欲しかった為<br>&emsp;&emsp;本アプリを制作致しました。</li>
      </ul>
    </div>
  </div>
  <hr class="hr2">
  <div class="ex-containar1">
    <br>
    <br>
    <br>
    <h1 class="how-to-use">本アプリで出来る事をお伝えしました。<br>次にアプリ使用方法について、順番に<br>ご説明致します。</h1>
    <br>
    <div class="arrow"><img src="{{ asset('img/arrow.png') }}"></div>
    <p class="comment">
      当アプリをご利用になりたい方で<br>
      まだ新規登録がお済みではない方は、画面内に見えます<br>
      飛行機アイコンをクリック！してみて下さい。<br>
      トップページ上部に移動します。<br>
      新規登録をクリックすると新規登録ページが表示されます。<br><br>
      &emsp;&emsp;・お名前<br>
      &emsp;&emsp;・メールアドレス<br>
      &emsp;&emsp;・パスワード<br>
      &emsp;&emsp;・確認用パスワード（パスワードと同じ内容）<br><br>
      それぞれを入力して頂き、ユーザー登録を済ませて下さい。
    </p>
    <div class="right-woman"><img src="{{ asset('img/指をさす女性.png') }}" class="right-woman1"></div>
  </div>
  <div class="arrow1"><img src="{{ asset('img/arrow.png') }}"></div>
  <div class="l-wrapper">
    <main>

      <div id="demo10" class="flow01 l-section">
        <div class="l-inner">

          <div class="swiper-pagination-main"></div>
          <div class="swiper swiper-main">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="mainslide">
                  <h2 class="mainslide-title">家計簿のつけ方</h2>
                  <div class="swiper swiper-sub">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明.png') }}" alt="ログイン後"></div>
                          <p class="subslide-text">①家計簿のつけ方。<br><br>ログインが完了すると家計簿をつけるカレンダーが表示されます。<br>カレンダーの日付をクリックして下さい。<br>日付はどこでも構いません。次の説明に移ります。<br>左クリックをしたまま左方向に動かして下さい。<br>又は下の■をクリックすると次の説明に変わります。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明出費登録.png') }}" alt="出費登録"></div>
                          <p class="subslide-text">②家計簿登録。<br><br>日付をクリックすると出費を登録する事が出来ます。<br>家計簿項目は種類の中から選んで下さい。<br>出費には、数値だけをご記入下さい。<br>日付選択から、出費をつけたい日を設定して下さい。<br>カテゴリー色では家計簿項目の背景色の設定が出来ます。<br>文字色は家計簿の文字色となります。お好きな色をつけて下さい。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明出費登録完了.png') }}" alt="出費登録完了"></div>
                          <p class="subslide-text">③家計簿登録、項目確認。<br><br>最後に登録を押しますと、家計簿が登録されます。<br>何の出費だったのかを確認したい場合<br>該当出費にカーソルを合わせると登録した項目が表示されます。<br>家計簿の付け方についての、ご説明は以上となります。</p>
                        </div>
                      </div>
                    </div><!-- /swiper-wrapper -->
                    <div class="swiper-pagination-sub"></div>
                  </div><!-- /swiper-sub -->
                </div>
              </div>

              <div class="swiper-slide">
                <div class="mainslide">
                  <h2 class="mainslide-title">目標設定</h2>
                  <div class="swiper swiper-sub">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明目標登録.png') }}" alt="目標登録"></div>
                          <p class="subslide-text">①目標の設定方法。<br><br>カレンダーの上部に目標を設定する事が出来ます。<br>家計簿目標メニューの下にある登録をクリックして下さい。<br>目標と設定金額を設定して下さい。目標設定は一つのみとなります。<br>設定が終わりましたら登録をクリック。<br>目標が登録されます。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明目標編集.png') }}" alt="目標編集"></div>
                          <p class="subslide-text">②目標の編集方法。<br><br>目標が登録されている場合のみ、編集が行えます。<br>家計簿目標メニューの編集をクリック。<br>登録した目標が表示されていますので編集して下さい。<br>編集が終わりましたら編集をクリック。<br>編集した内容が目標に再設定されます。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明目標削除.png') }}" alt="目標削除"></div>
                          <p class="subslide-text">③目標の削除方法。<br><br>編集と同様、登録されている場合のみ削除が行えます。<br>家計簿目標メニューの削除をクリック。<br>登録した内容が表示されています。<br>削除をクリックで目標が削除されます。<br>目標設定のご説明は以上となります。</p>
                        </div>
                      </div>
                    </div><!-- /swiper-wrapper -->
                    <div class="swiper-pagination-sub"></div>
                  </div><!-- /swiper-sub -->
                </div>
              </div>

              <div class="swiper-slide">
                <div class="mainslide">
                  <h2 class="mainslide-title">月の出費合計確認</h2>
                  <div class="swiper swiper-sub">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明出費合計.png') }}" alt="出費合計"></div>
                          <p class="subslide-text">①出費合計の確認方法。<br><br>カレンダー左上にある出費合計をクリックして下さい。<br>月末でなくても確認は行えます。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明出費説明.png') }}" alt="出費説明"></div>
                          <p class="subslide-text">②出費合計の表示方法。<br><br>年月を選んで頂いた後に表示ボタンをクリックして下さい。<br>出費が登録されていれば合計値が表示されます。<br>目標が登録されていれば、合わせて確認する事が出来ます。<br>目標は長期、短期なのかは、ご利用される方が決めて下さい。<br>表示出来る出費は年月で選べる範囲となります。<br>対象外の年月は表示出来ませんので、ご了承下さい。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明出費円グラフ.png') }}" alt="出費円グラフ"></div>
                          <p class="subslide-text">③出費合計の表示方法。<br><br>出費から円グラフと割合を確認する事が出来ます。<br>出費の多い順に表示されます。<br>出費合計から目標を達成する為に何が必要なのか考えてみて下さい。<br>月の出費合計の確認方法のご説明は以上となります。</p>
                        </div>
                      </div>
                    </div><!-- /swiper-wrapper -->
                    <div class="swiper-pagination-sub"></div>
                  </div><!-- /swiper-sub -->
                </div>
              </div>

              <div class="swiper-slide">
                <div class="mainslide">
                  <h2 class="mainslide-title">アドバイス投稿の仕方</h2>
                  <div class="swiper swiper-sub">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明アドバイス投稿.png') }}" alt="アドバイス投稿"></div>
                          <p class="subslide-text">①アドバイス投稿の登録方法。<br><br>カレンダー右上にあるアドバイス投稿をクリックして下さい。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明アドバイス投稿仕方.png') }}" alt="投稿仕方"></div>
                          <p class="subslide-text">②アドバイス投稿の記入方法。<br><br>カテゴリーは複数選択可能です。<br>それぞれのカテゴリーに内容が登録される形式にしています。<br>そのため、都道府県を選択される場合<br>県内在住の方向けの内容を投稿して下さい。<br>節約術、買い物の心得は<br>誰にでも実践出来る内容を投稿して頂きたいです。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明アドバイス登録.png') }}" alt="アドバイス登録"></div>
                          <p class="subslide-text">③アドバイス投稿の登録方法。<br><br>投稿の記入が終わりましたら、投稿ボタンをクリックして下さい。<br>確認が表示されます。<br>登録する場合は投稿ボタンをクリックで投稿が登録されます。<br>内容の再確認をしたい場合はキャンセルボタンで画面に戻ります。<br>アドバイス投稿方法についてのご説明は以上となります。</p>
                        </div>
                      </div>
                    </div><!-- /swiper-wrapper -->
                    <div class="swiper-pagination-sub"></div>
                  </div><!-- /swiper-sub -->
                </div>
              </div>

              <div class="swiper-slide">
                <div class="mainslide">
                  <h2 class="mainslide-title">アドバイスの見方</h2>
                  <div class="swiper swiper-sub">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明投稿一覧.png') }}" alt="投稿一覧"></div>
                          <p class="subslide-text">①アドバイスの見方。<br><br>カレンダー右上にある投稿一覧をクリックして下さい。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明投稿検索.png') }}" alt="投稿検索"></div>
                          <p class="subslide-text">②タイトル検索。<br><br>画面左にある投稿検索に検索したいキーワードを入力。<br>入力後、アイコンをクリックで検索が出来ます。<br>投稿のタイトルと一致するキーワードであれば<br>投稿タイトルの部分に該当する投稿が表示されます。<br>該当しない場合、何も表示されません。<br>別のキーワードで検索されるか、次の説明を試して下さい。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明カテゴリー検索.png') }}" alt="カテゴリー検索"></div>
                          <p class="subslide-text">③カテゴリー検索。<br><br>表示させたいカテゴリーがあった場合<br>該当のカテゴリーをクリックして下さい。<br>該当するカテゴリーに登録されている投稿があれば<br>投稿タイトル部分に投稿と件数が表示されます。<br>何も表示されていない場合、投稿が登録されていません。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明投稿確認.png') }}" alt="投稿確認"></div>
                          <p class="subslide-text">④投稿内容確認。<br><br>投稿が登録されていれば投稿がここに表示されます。<br>タイトルの内容を見たい場合、該当タイトルをクリックして下さい。<br>投稿の登録件数が多数あると表示切り替えが表示されます。<br>別の投稿を探したい場合に、ご使用下さい。<br>表示切替はここでしか行えません。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明投稿内容.png') }}" alt="投稿内容、感謝登録"></div>
                          <p class="subslide-text">⑤投稿内容、感謝を送る。<br><br>該当タイトルをクリック後、投稿の内容ページが表示されます。<br>投稿の内容がいい内容だと思った投稿に感謝を送る事が出来ます。<br>同じ投稿に何度も感謝は送れません。<br>感謝を送るボタンをクリックすると感謝が送れます。<br>いい投稿には感謝を送りましょう。<br>そして実践してみましょう。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明投稿感謝削除.png') }}" alt="感謝削除"></div>
                          <p class="subslide-text">⑥感謝を外す。<br><br>投稿に間違えて感謝を送ってしまった場合等が発生した際<br>感謝を外したい場合、感謝を外すボタンをクリックして下さい。<br>投稿に送った感謝を外す事が出来ます。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明違反投稿通報.png') }}" alt="投稿通報"></div>
                          <p class="subslide-text">⑦違反投稿を見つけた場合。<br><br>利用規約に違反している投稿を見つけられましたら<br>投稿内容右下にある、違反通報をクリックして下さい。<br>違反投稿を通報する事が出来ます。<br>違反投稿の内容を信じ、何か行動をされて損害が発生しても<br>【一切責任は取れませんので、ご了承下さい。】</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明違反投稿通報登録.png') }}" alt="通報登録"></div>
                          <p class="subslide-text">⑧違反投稿の通報。<br><br>違反通報をクリックすると違反投稿の内容が表示されます。<br>簡素で構いませんので、理由をご記入下さい。<br>ご記入が終わりましたら通報をクリックして下さい。<br>違反投稿の通報が完了します。<br>送られた通報を元に、内容の確認後<br>利用規約に違反した方のアカウントは削除されます。</p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="subslide">
                          <div class="subslide-media"><img src="{{ asset('img/アプリ説明最後.png') }}" alt="ご挨拶"></div>
                          <p class="subslide-text">最後に<br><br>本アプリのご使用方法についてのご説明は以上となります。<br>利用規約を正しく守って頂き<br>家計簿をより良い物としてご利用頂けたらと思います。<br>説明をご覧頂き、ありがとうございました！</p>
                        </div>
                      </div>
                    </div><!-- /swiper-wrapper -->
                    <div class="swiper-pagination-sub"></div>
                  </div><!-- /swiper-sub -->
                </div>
              </div>
              
            </div><!-- /swiper-wrapper -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div><!-- /swiper-main -->
        </div>
      </div>
    </main>
    <h2 id="elm1" class="ex-h2">本アプリではユーザーの皆様が実際に行われている、節約術などを投稿する事が出来ます。</h2>
    <p class="text">是非、ユーザーの皆様同士で実際に収支を改善させる為に日頃からされている節約術やお買い物などをする際の心構えなど<br>様々な事を共有して頂き、皆様で<strong>賢く！楽しく！</strong>目標を達成できる様に家計簿をつけましょう！</p>
  </div>

  <img src="{{ asset('img/トップボタン.png') }}" alt="トップページに戻る" id="scroll_top_button">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js" integrity="sha512-gmwBmiTVER57N3jYS3LinA9eb8aHrJua5iQD7yqYCKa5x6Jjc7VDVaEA0je0Lu0bP9j7tEjV3+1qUm6loO99Kw==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/Flip.min.js" integrity="sha512-byzUdBXaTSrgrlWDvkyU6TBkRSUUiI3EzVIdZtrYEUx1hFnsel9QmEs3QWpKo+8N+G9eOjSxQzFWF1PLq0+WVw==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <script src="{{ asset('/js/move.js') }}"></script>
  <script src="{{ asset('/js/scroll-topbtn.js') }}"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('/js/swiper.js') }}"></script>
  @endsection