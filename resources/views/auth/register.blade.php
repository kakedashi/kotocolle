@extends('layouts.base')

@section('title', '新規登録')

@section('content')
    <div class="container">
        {{-- カード本体 --}}
        <div class="card mt-5">
            <div class="card-header h3 p-4 text-center text-light bg-primary mb-0">新規登録</div>
            <div class="card-body border border-top-0 border-primary mb-3">
                {{-- 送信フォーム --}}
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    {{-- ユーザー名 --}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">ユーザー名</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- メールアドレス --}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">メールアドレス</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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

                    {{-- パスワード確認 --}}
                    <div class="form-group">
                        <label for="password-confirm" class="control-label">パスワード確認</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    {{-- 新規登録ボタン --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">
                            新規登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
