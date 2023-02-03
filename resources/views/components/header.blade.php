<nav class="navbar navbar-expand">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/app-logo.png') }}" class="logo">
        </a>
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <nav class="nav">
            <ul class="nav-links">
                <div class="nav-item">
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
                    <div class="active-nav"></div>
                </div>
                @endif
                @if (Route::has('register'))
                <div class="nav-item">
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a></li>
                </div>
                @endif
        </nav>
        @else
        <div id="login-table">
            <p id="logging">ユーザー名:</p>
            <p id="login-user">{{ Auth::user()->name }}</p>
            <a href="{{ url('/user/profile') }}" class="user-profile">登録情報</a>
        </div>
        <ul class="nav-links1">
            <div class="nav-item1">
                <li><a class="nav-link1" href="{{ url('/list/advice') }}">{{ __('投稿一覧') }}</a></li>
                <div class="active-nav1"></div>
            </div>
            <div class="nav-item1">
                <li><a class="nav-link1" href="{{ url('/advice') }}">{{ __('アドバイス投稿') }}</a></li>
            </div>
            <div class="nav-item1">
                <li><a class="nav-link1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <button id="toggle_btn">
                <span class="span"></span>
                <span class="span1"></span>
                <span class="span2"></span>
                <span class="span3"></span>
            </button>
            <div id="menu_area">
                <a class="remove" href="{{ url('user/profile') }}">登録情報</a>
                <a class="remove" href="{{ url('/calendar') }}">家計簿</a>
                <a class="remove" href="{{ url('/advice') }}">アドバイス投稿</a>
                <a class="remove" href="{{ url('list/advice') }}">投稿一覧</a>
                <a class="remove" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
    </div>
    </div>
    </li>
    </ul>
    </ul>
</nav>
@endguest
</ul>
</div>
</div>
</nav>