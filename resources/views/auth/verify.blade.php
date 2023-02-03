@extends('layouts.app1')
@section('content')
    <main>
        <div class="user-wrapper">
            <div class="top-space"></div>
            <div class="user-mail-post">
                <h3 class="head-title">皆で家計簿アプリに、ご登録ありがとうございます。</h3>
                <p class="center-area-title">現在、仮登録の状態になっています。<br>
                    ただいま、ご入力頂いたメールアドレス宛に、<br>ご本人様確認用のメールをお送りしました。<br>
                    メール本文内のURLをクリックして頂きますと<br>本登録が完了となります。
                </p>
                <div class="text-center">
                    <a href="{{ url('/') }}" class="top-page-btn">トップページへ</a>
                </div>
            </div>
        </div>
    </main>
@endsection
