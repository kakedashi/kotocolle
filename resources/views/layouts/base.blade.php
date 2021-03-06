<!DOCTYPE html>
<html lang="ja">
  <head>
    {{-- メタタグ --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRFトークン --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- フッター用CSS --}}
    <link rel="stylesheet" href="{{ secure_asset('css/Bootstrap-sticky-footer.css') }}" type="text/css">
    {{-- ジャンボトロン用CSS --}}
    <style>
      .jumbotron {
        background-image: url('images/top_background.jpg');
        background-size: cover;
      }
    </style>
    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      {{-- ナビバー --}}
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        {{-- トップページリンクロゴ --}}
        <a class="navbar-brand ml-5" href="{{ action('IndexController@index') }}">
          {{ config('app.name', 'ことコレ') }}
        </a>
        {{-- ナビバートグル --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        {{-- 認証状態別ナビアイテム --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
          <ul class="navbar-nav">
            @guest
              <li class="nav-item">
                <a class="nav-link text-light mr-5" href="{{ action('WordController@share_word_index') }}">みんなの言葉</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light mr-5" href="{{ route('register') }}">新規登録</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light mr-5" href="{{ route('login') }}">ログイン</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link text-light mr-5" href="{{ action('WordController@share_word_index') }}">みんなの言葉</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light mr-5" href="{{ action('UserController@userinfo_index') }}">ユーザー設定</a>
              </li>
              <li class="nav-item">
                <span class="nav-link text-light mr-5">{{ Auth::user()->name }}</span>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}"
                  class="nav-link text-light mr-5"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            @endguest
          </ul>
        </div>
      </nav>
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer class="footer">
      <div class="container">
        <p class="text-center text-light">Developed by felixmores</p>
      </div>
    </footer>
    

    {{-- JQuery、popper.js、Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    {{-- 画像ファイル名を取得して表示　--}}
    <script type="text/javascript">
      $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);
      });
    </script>
  </body>
</html>