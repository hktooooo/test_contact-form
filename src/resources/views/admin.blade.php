@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>

  <!-- 検索フォーム -->
  <form class="search-form" action="/admin/search" method="get">
  @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="name_email" placeholder="名前やメールアドレスを入力してください"/>
      <select class="search-form__item-select-gender" name="gender">
        <option value="">性別</option>
          <option value=1>男性</option>
          <option value=2>女性</option>
          <option value=3>その他</option>
      </select>
      <select class="search-form__item-select-category" name="category_id">
        <option value="">お問い合わせの種類</option>
          @foreach ($categories as $category)
          <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
          @endforeach
      </select>
      <input type="date" class="search-form__item-select-date" name="date">
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-reset" type="submit">リセット</button>
    </div>
  </form>

  <form class="search-form" action="/admin/search" method="get">
  @csrf

  </form>


  <!-- エクスポートとページ送り -->
  <div class="admin__additional__features">
    <div class="additional__features__button">
      <button class="additional__features-export" type="submit">エクスポート</button>
    </div>
    <div class="additional__features-pagination">
      <p>123456</p>
    </div>
  </div>

  <!-- データテーブル -->
  <div class="admin-table">
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header"></th>
        <th class="admin-table__header">お名前</th>
        <th class="admin-table__header">性別</th>
        <th class="admin-table__header">メールアドレス</th>
        <th class="admin-table__header">お問い合わせの種類</th>
        <th class="admin-table__header"></th>
      </tr>
      @foreach ($contacts as $contact)
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">{{ $contact['first_name'] }}</td>
        <td class="admin-table__item">
          @switch( $contact['gender'] )
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
        <td class="admin-table__item">{{ $contact['email'] }}</td>    
        <td class="admin-table__item">{{ $contact->getContent() }}</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      @endforeach
    </table>
    <div class="additional__features-pagination_1">
      {{ $contacts->links('vendor.pagination.custom') }}
    </div>
  </div>
</div>
@endsection