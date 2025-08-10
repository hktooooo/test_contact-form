@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="register__content">
  <div class="register__heading">
    <h2>Register</h2>
  </div>
  <form class="form" action="/confirm" method="post">
  @csrf
    <!-- 名前 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->



        </div>
      </div>
    </div>


    <!-- メールアドレス -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->



        </div>
      </div>
    </div>
    <!-- パスワード -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">パスワード</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password" placeholder="例: coachtech1106" value="{{ old('password') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->



        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
  </form>
</div>
@endsection
