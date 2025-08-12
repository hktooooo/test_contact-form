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
            <input class="confirm-table__text-name" type="text" name="last_name" value="{{ $last_name }}" readonly />
            <input class="confirm-table__text-name" type="text" name="first_name" value="{{ $first_name }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="hidden" name="gender" value="{{ $gender }}" />
            @switch($gender)
              @case(1)
                男性
                @break
              @case(2)
                女性
                @break
              @case(3)
                その他
                @break
              @default
            @endswitch
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $email }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tel" value="{{ $tel }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $address }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $building }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="hidden" name="category_id" value="{{ $category_id }}" />
            {{ $content }}
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $detail }}" readonly />
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