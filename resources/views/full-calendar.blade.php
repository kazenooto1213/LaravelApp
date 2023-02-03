<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>皆で家計簿</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/sass/app.scss'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href='{{ asset('fullcalendar-5.11.3/lib/main.css') }}' rel='stylesheet' />
    <link rel="shortcut icon" href="{{ asset('img/app.ico') }}">
    
</head>

<body>
    <header>
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
    </header>
    <main>
        @auth
        <div class="calendar-area">
            <div class="app-area">
                <div class="null"></div>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="error-message">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                @if(session('message'))
                <div class="alert-area">
                    <div class="alert alert-success">{{session('message')}}</div>
                </div>
                @endif
                <div class="target-category-area">
                    <article class="target-category-article">
                        <div class="target-category">家計簿目標</div>
                        <div class="target-price">&emsp;設定金額</div>
                    </article>
                    @foreach($targets as $target)
                    @if(!empty($target->user_id === Auth::id()))
                    <article class="target-category-article1">
                        <div class="target-category-1">{{ $target->target_category }}</div>
                        <div class="target-price-1">￥{{ number_format((float)$target->target) }}</div>
                    </article>
                    @endif
                    @endforeach
                    <article class="target-category-article2">
                        <div class="target-category-menu">家計簿目標メニュー</div>
                        <div class="target-menu-area">
                            @if(empty($user_target === $id))
                            <div id="targetBtn" class="btn btn-primary"><img src="{{ asset('img/create-btn.png') }}" class="register1">登録</div>
                            @endif
                            <form method="post" action="{{ route('event') }}">
                                @csrf
                                <div class="modal" id="targetRegisterModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">目標登録</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"><span></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                <p class="target-title">目標：<input type="text" name="target_category" placeholder="目標を記入。"></p>
                                                <p class="target">設定：<input type="text" name="target" placeholder="目標金額を記入。(数値のみ）"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="register-target" type="submit">登録</button>
                                                <button type="button" class="cancelBtn" data-bs-dismiss="modal">キャンセル</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @foreach($targets as $target)
                            @if(!empty($target->user_id === Auth::id()))
                            <div id="editBtn" class="btn btn-success btn1"><img src="{{ asset('img/advice-edit.png') }}" class="target-edit edit1">編集</div>
                            @endif
                            @endforeach
                            @foreach($targets as $target)
                            @if($target->user_id === Auth::id())
                            <form method="post" action="{{ route('update')}}">
                                @csrf
                                @method('PUT')
                                <div class="modal" id="targetEditModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">目標編集</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"><span></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="{{ $target->id }}">
                                                <input type="hidden" name="user_id" value="{{ $target->user_id }}">
                                                <p class="dialog-title">目標：<input type="text" name="target_category" placeholder="目標を再記入。" value="{{ $target->target_category }}"></p>
                                                <p class="dialog-target">設定：<input type="text" name="target" placeholder="目標金額を再記入。" value="{{ $target->target }}"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="edit-target" type="submit">編集</button>
                                                <button type="button" class="cancelBtn" data-bs-dismiss="modal">キャンセル</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                            @endforeach
                            @foreach($targets as $target)
                            @if(!empty($target->user_id === Auth::id()))
                            <div id="deleteBtn" class="btn btn-danger btn2"><img src="{{ asset('img/advice-delete1.png') }}" class="target-delete">削除</div>
                            @endif
                            @endforeach
                            @foreach($targets as $target)
                            @if($target->user_id === Auth::id())
                            <form method="post" action="{{ route('delete') }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal" id="targetDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">目標削除</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"><span></span></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="{{ $target->id }}">
                                                <input type="hidden" name="user_id" value="{{ $target->user_id }}">
                                                <div class="target-category1">家計簿目標：{{ $target->target_category }}</div>
                                                <div class="target-price1">&emsp;設定金額：￥{{ number_format((float)$target->target) }}</div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="delete-target" type="submit">削除</button>
                                                <button type="button" class="cancelBtn" data-bs-dismiss="modal">キャンセル</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                            @endforeach
                        </div>
                    </article>
                </div>
            </div>
            <div class="total-container">
                <a href="{{ url('/calendar/total_balance') }}" class="total-container-a">
                    <div class="total-container-left">
                        <p class="total-title">出費合計</p>
                        <div class="total-icon"></div>
                    </div>
                </a>
            </div>
            <div id="calendar-area" style="background-color:white">
                <div class="response"></div>
                <div id="detail-area"></div>
                <div id='calendar'></div>
            </div>
        </div>
        </div>
        <form method="post" action="{{ route('expenseUpdate') }}" id="expenseEditForm">
            @csrf
            <div class="modal" id="expenseEditModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">出費編集、削除</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"><span></span></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="edit_id" value="" name="id">
                            <input type="hidden" id="edit_user_id" value="" name="user_id">
                            <div class="category-wrapper">
                                <p class="expense-category">家計簿項目：</p>
                                <select name="expense_category" class="expense-select" id=edit_category value="">
                                    @foreach($expense_category as $expense)
                                     <option name="expense_category">{{ $expense->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="expense-category">出費：<input type="text" name="expense" id="edit_title" value=""></p>
                            <div class="category-color">
                                <p class="color-title">カテゴリー色：</p>
                               <p class="color"><input type="color" name="color" id="edit_color" value=""></p>
                            </div>
                            <div class="title-color">
                                <p class="text-color-title">文字色：</p>
                                <p class="text-color"><input type="color" name="text_color" id="edit_text" value=""></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="edit-expense" type="submit" name="update" form="expenseEditForm">編集</button>
                            <button class="delete-expense" type="submit" name="delete" form="expenseEditForm">削除</button>
                            <button type="button" class="cancelBtn" data-bs-dismiss="modal">キャンセル</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @include('modal')
        @endauth
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/tippy.js@6" defer></script>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src='{{ asset('fullcalendar-5.11.3/lib/main.js') }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js" integrity="sha512-gmwBmiTVER57N3jYS3LinA9eb8aHrJua5iQD7yqYCKa5x6Jjc7VDVaEA0je0Lu0bP9j7tEjV3+1qUm6loO99Kw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/Flip.min.js" integrity="sha512-byzUdBXaTSrgrlWDvkyU6TBkRSUUiI3EzVIdZtrYEUx1hFnsel9QmEs3QWpKo+8N+G9eOjSxQzFWF1PLq0+WVw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="{{ asset('/js/move.js') }}"></script>
    <script src="{{ asset('/js/modal_target.js') }}"></script>
    <script src="{{ asset('/js/ajax-setup.js') }}"></script>
    <script src="{{ asset('/js/menu.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let event = {{ Js::from($event) }};
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                selectable: true,
                initialView: 'dayGridMonth',
                locale: 'ja',
                firstDay: 1,
                headerToolbar: {
                    left: "",
                    center: "title",
                    right: "today prev,next"
                },
                buttonText: {
                    today: '当日',
                },
                eventDidMount: (e) => { // カレンダーに配置された時のイベント
                    tippy(e.el, { // TippyでTooltipを設定する
                        content: e.event.extendedProps.description,
                    });
                },
                dayCellContent: function(e) {
                    e.dayNumberText = e.dayNumberText.replace('日', '');
                },
                dateClick: function(date, event, view) {
                    $('#registerExpenseModal').modal('show');
                },
                editable: true,
                events: event,
                eventClick: function getMarkerPos(info) {
                    document.getElementById('edit_id').value = info.event.id;
                    document.getElementById('edit_user_id').value = info.event.extendedProps.user_id;
                    document.getElementById('edit_title').value = info.event.title;
                    document.getElementById('edit_category').value = info.event.extendedProps.description;
                    document.getElementById('edit_color').value = info.event.backgroundColor;
                    document.getElementById('edit_text').value = info.event.textColor;
                    $('#expenseEditModal').modal('show');
                    console.log(info.event);
                }
            });
            calendar.render();
            const registerExpenseModal = bootstrap.Modal.getOrCreateInstance('#registerExpenseModal');
            const expenseEditModal = bootstrap.Modal.getOrCreateInstance('#expenseEditModal');
        });
    </script>
</body>

</html>