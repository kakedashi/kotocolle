@extends('layouts.base')

@section('title', 'ログイン')

@section('content')
    <div class="container">
        {{-- カード本体 --}}
        <div class="card mt-5">
            <div class="card-header p-4 h3 text-center text-light bg-primary mb-0">ログイン</div>
            <div class="card-body border border-top-0 border-primary">
                {{-- 送信フォーム --}}
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    {{-- メールアドレス --}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">メールアドレス</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- パスワード --}}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">パスワード</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- ログイン保持チェックボックス --}}
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> ログイン情報を保持する
                            </label>
                        </div>
                    </div>

                    {{-- ログインボタン、パスワード忘れリンク --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">
                            ログイン
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            パスワードを忘れた方
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
