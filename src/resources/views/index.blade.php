@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/contacts/confirm" method="post">
  @csrf
    <!-- 名前 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name" placeholder="テスト太郎" value="{{ old('name') }}" />
          <input type="text" name="name" placeholder="テスト太郎" value="{{ old('name') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- 性別 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text++++++++++++">
          <input type="radio" name="sex" value="男性">男性
          <input type="radio" name="sex" value="女性">女性
          <input type="radio" name="sex" value="その他">その他
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- メールアドレス -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- 電話番号 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="tel" name="tel" placeholder="09012345678" value="{{ old('tel') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->
          @error('tel')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- 住所 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->
          @error('address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- 建物名 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="tel" name="tel" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('tel') }}" />
        </div>
      </div>
    </div>
    <!-- お問い合わせの種類 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text=============">
          <select name="category">
            <option value="">選択してください</option>
          </select>
        </div>
        <div class="form__error">
          <!--バリデーション機能を実装したら記述します。-->
          @error('tel')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- お問い合わせ内容 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="content" placeholder="お問い合わせ内容をご記載ください"></textarea>
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection
