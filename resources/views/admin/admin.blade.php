<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="csrf-token" content="30qYCAZ2o3qXacTm2yoflFLsRyGOjxp2EaS5DaeP">
  <title>Admin | 管理者専用ページ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/iCheck/all.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/flatpickr/dist/shortcut-buttons-flatpickr/themes/light.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-fileinput/css/fileinput.min.css?v=4.5.2">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/dist/css/skins/skin-blue-light.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/laravel-admin/laravel-admin.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/nprogress/nprogress.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/sweetalert2/dist/sweetalert2.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/nestable/nestable.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/toastr/build/toastr.min.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap3-editable/css/bootstrap-editable.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/google-fonts/fonts.css">
  <link rel="stylesheet" href="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css">
  <link rel="shortcut icon" href="{{ asset('img/app.ico') }}">


  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue-light sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="http://localhost/household-account-book/public/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>GO</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>皆で家計簿 管理者</b></span>
      </a>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <ul class="nav navbar-nav hidden-sm visible-lg-block"></ul>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="javascript:void(0);" class="container-refresh">
                <i class="fa fa-refresh"></i>
              </a>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/dist/img/profile-icon.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">管理者</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/dist/img/profile-icon.png" class="img-circle" alt="User Image">
                  <p class="admin-font">
                    管理者
                    <small>管理者登録日&nbsp;&nbsp;{{ $admin->created_at->format('Y年m月d日s時m分') }}</small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="http://localhost/household-account-book/public/admin/auth/setting" class="btn btn-default btn-flat admin-font">設定</a>
                  </div>
                  <div class="pull-right">
                    <a href="http://localhost/household-account-book/public/admin/auth/logout" class="btn btn-default btn-flat admin-font">ログアウト</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/dist/img/profile-icon.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p class="admin-font">管理者</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> オンライン</a>
          </div>
        </div>
        <!-- search form (Optional) -->
        <form class="sidebar-form" style="overflow: initial;" onsubmit="return false;">
          <div class="input-group">
            <input type="text" autocomplete="off" class="form-control autocomplete" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            <ul class="dropdown-menu" role="menu" style="min-width: 210px; max-height: 300px; overflow: auto; display: none;">
              <li>
                <a href="http://localhost/household-account-book/public/admin/users"><i class="fa fa-users"></i>ユーザー</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/violation_report"><i class="fa fa-envelope"></i>違反投稿確認</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/users_advice"><i class="fa fa-envelope-o"></i>
              アドバイス</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin"><i class="fa fa-bar-chart"></i>ダッシュボード</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/users"><i class="fa fa-users"></i>ユーザー</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/roles"><i class="fa fa-user"></i>役割</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/permissions"><i class="fa fa-ban"></i>許可</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/menu"><i class="fa fa-bars"></i>メニュー</a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/logs"><i class="fa fa-history"></i>操作ログ</a>
              </li>
            </ul>
          </div>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">メニュー</li>
          <li>
            <a href="http://localhost/household-account-book/public/admin/users">
              <i class="fa fa-users"></i>
              <span>ユーザー</span>
            </a>
          </li>
          <li class="active">
            <a href="http://localhost/household-account-book/public/admin/violation_report">
              <i class="fa fa-envelope"></i>
              <span>違反投稿確認</span>
            </a>
          </li>
          <li class="">
            <a href="http://localhost/household-account-book/public/admin/users_advice">
              <i class="fa fa-envelope-o"></i>
              <span>アドバイス</span>
            </a>
          </li>
          <li class="">
            <a href="http://localhost/household-account-book/public/admin">
              <i class="fa fa-bar-chart"></i>
              <span>ダッシュボード</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-tasks"></i>
              <span>管理者</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/users">
                  <i class="fa fa-users"></i>
                  <span>ユーザー</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/roles">
                  <i class="fa fa-user"></i>
                  <span>役割</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/permissions">
                  <i class="fa fa-ban"></i>
                  <span>許可</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/menu">
                  <i class="fa fa-bars"></i>
                  <span>メニュー</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/household-account-book/public/admin/auth/logs">
                  <i class="fa fa-history"></i>
                  <span>操作ログ</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper" id="pjax-container" style="min-height: 868px;">
      <style type="text/css"></style>
      <div id="app" class=" ">
        <section class="content-header">
          <h1>
            管理者専用ページ
            <small> </small>
          </h1>
          <!-- breadcrumb start -->
          <ol class="breadcrumb" style="margin-right: 30px;">
            <li><a href="http://localhost/household-account-book/public/admin"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
          <!-- breadcrumb end -->
        </section>
        <section class="content">
          <div class="admin-container">
            @if(session('message'))
            <div class="alert-area">
              <div class="alert alert-success">{{session('message')}}</div>
            </div>
            @endif
            <div class="admin-wrapper">
              <h1 class="app-title">WEBアプリ【皆で家計簿】</h1>
            </div>
            <div class="admin-menu-area">
              <div class="admin-menubar">
                <ul class="admin-menu-ul">
                  <li class="admin-menu-li">
                    <h2 class="admin-menu-title"><i class="fa fa-gear icon"></i>メニュー</h2>
                    <a class="menu-icon" href="http://localhost/household-account-book/public/admin/users">
                      <i class="fa fa-users icon"></i>
                      <span class="admin-span">ユーザー</span>
                    </a>
                    <a class="menu-icon" href="http://localhost/household-account-book/public/admin/violation_report">
                      <i class="fa fa-envelope icon"></i>
                      <span class="admin-span">違反投稿確認</span>
                    </a>
                    <a class="menu-icon" href="http://localhost/household-account-book/public/admin/users_advice">
                      <i class="fa fa-envelope-o"></i>
                      <span class="admin-span">アドバイス</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="notification-area">
              <div class="title-area-color">
                <h2 class="notification-title">通知</h2>
              </div>
              <div class="notification-container">
                <article class="notification-violation">
                  <div class="violation-title-area">違反投稿通報</div>
                  <div class="violation-area">
                    @foreach($violation_reports as $report)
                    @foreach($user as $value)
                    @if($report->user_id == $value->id)
                    <p class="violation-p">{{ $report->created_at->format('Y年m月d日H時i分') }}&nbsp;&nbsp;{{ $value->name }}様から違反投稿の通報がありました。</p>
                    @endif
                    @endforeach
                    @endforeach
                  </div>
                </article>
                <article class="notification-user">
                  <div class="user-delete-area">アカウント削除情報</div>
                  <div class="user-violation">
                    @foreach($user_delete as $data)
                    @if($data->deleted_at === 1)
                    <p class="violation-p">ユーザーID：{{ $data->id }}&nbsp;&nbsp;{{ $data->name }}様が退会しました。</p>
                    @endif
                    @endforeach
                  </div>
                </article>
              </div>
            </div>
            <div class="menu-btn-area">
              <a href="http://localhost/household-account-book/public/admin/user/notification" class="notification-link-btn">通知を送る</a>
              <a href="http://localhost/household-account-book/public/admin/auth/logout" class="logout-btn">ログアウト</a>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        <strong>Env</strong>&nbsp;&nbsp; local

        &nbsp;&nbsp;&nbsp;&nbsp;

        <strong>Version</strong>&nbsp;&nbsp; 1.8.17

      </div>
      <!-- Default to the left -->
      <strong>Powered by <a href="https://github.com/z-song/laravel-admin" target="_blank">laravel-admin</a></strong>
    </footer>
  </div>

  <button id="totop" title="Go to top" style="display: none;"><i class="fa fa-chevron-up"></i></button>

  <script data-exec-on-popstate="">
        $(function() {
          ;
          (function() {
            $('.container-refresh').off('click').on('click', function() {
              $.admin.reload();
              $.admin.toastr.success('更新しました！', '', {
                positionClass: "toast-top-center"
              });
            });
          })();
        });
  </script>
  <script>
    function LA() {}
    LA.token = "30qYCAZ2o3qXacTm2yoflFLsRyGOjxp2EaS5DaeP";
    LA.user = {
      "id": 1,
      "username": "admin",
      "name": "\u7ba1\u7406\u8005",
      "avatar": "http:\/\/localhost\/household-account-book\/public\/vendor\/laravel-admin\/AdminLTE\/dist\/img\/profile-icon.png"
    };
  </script>

  <!-- REQUIRED JS SCRIPTS -->
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/dist/js/app.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/jquery-pjax/jquery.pjax.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/nprogress/nprogress.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/nestable/jquery.nestable.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/toastr/build/toastr.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/laravel-admin/laravel-admin.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/moment/min/moment-with-locales.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/flatpickr/dist/flatpickr.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/flatpickr/dist/shortcut-buttons-flatpickr/shortcut-buttons-flatpickr.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/flatpickr/dist/l10n/zh.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-fileinput/js/fileinput.min.js?v=4.5.2"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/select2/select2.full.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/number-input/bootstrap-number-input.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.min.js"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-fileinput/js/plugins/sortable.min.js?v=4.5.2"></script>
  <script src="http://localhost/household-account-book/public/vendor/laravel-admin/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js"></script>
</body>

</html>