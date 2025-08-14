@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/confirm" method="post">
  @csrf
    <!-- 名前 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <div class="form__input--name">
            <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
            <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
          </div>
        </div>
        <div class="form__error">
          <!-- バリデーション機能 -->
          @error('last_name')
            {{ $message }}
          @enderror
        </div>
        <div class="form__error">
          <!-- バリデーション機能 -->
          @error('first_name')
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
        <div class="form__input--radio">
          <label>
            <input type="radio" name="gender" value=1>男性
          </label>
          <label>
            <input type="radio" name="gender" value=2>女性
          </label>
          <label>
            <input type="radio" name="gender" value=3>その他
          </label>
        </div>
        <div class="form__error">
          <!-- バリデーション機能 -->
          @error('gender')
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
          <!-- バリデーション機能 -->
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
        <div class="form__input--text form__input--tel">
          <input type="tel" name="tel_first" placeholder="080" value="{{ old('tel_first') }}" />
          <p>-</p>
          <input type="tel" name="tel_second" placeholder="1234" value="{{ old('tel_second') }}" />
          <p>-</p>
          <input type="tel" name="tel_third" placeholder="5678" value="{{ old('tel_third') }}" />
        </div>
        <div class="form__error">
          <!-- バリデーション機能 -->
          @if ($errors->has('tel_first'))
            {{ $errors->first('tel_first') }}</>
          @endif
          @if (!$errors->has('tel_first') && $errors->has('tel_second'))
            {{ $errors->first('tel_second') }}</>
          @endif
          @if (!$errors->has('tel_first') && !$errors->has('tel_second') && $errors->has('tel_third'))
            {{ $errors->first('tel_third') }}</>
          @endif
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
          <!-- バリデーション機能 -->
          @error('address')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- 建物名 -->
    <div class="form__group-building">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text-building">
          <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
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
        <div class="form__input--text">
          <select class="form__input--category" name="category_id">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
              <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="form__error">
          <!-- バリデーション機能 -->
          @error('category_id')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- お問い合わせ内容 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
        </div>
        <div class="form__error">
          <!-- バリデーション機能 -->
          @error('detail')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection
