@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')

<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/thanks" method="post">
  @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <!-- <input type="text" name="name" value="" readonly /> -->
            <p class="confirm-table__text-name">山田</p>
            <p class="confirm-table__text-name">太郎</p>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <!-- <input type="email" name="email" value="" readonly /> -->
            男性
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <!-- <input type="email" name="email" value="" readonly /> -->
            test@example.com
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <!-- <input type="tel" name="tel" value="" readonly /> -->
            08012345678
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <!-- <input type="tel" name="tel" value="" readonly /> -->
            東京都
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <!-- <input type="tel" name="tel" value="" readonly /> -->
            東京タワー
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <!-- <input type="tel" name="tel" value="" readonly /> -->
            商品の交換について
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <!-- <input type="text" name="content" value="" readonly /> -->
            届いた商品が注文した商品ではありませんでした。</br>
            商品の取り換えをお願いします。
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <a href="/" class="form__button-revise">修正</a>
    </div>
  </form>
</div>
@endsection