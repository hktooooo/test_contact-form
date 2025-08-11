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
  <form class="search-form">
  @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" placeholder="名前やメールアドレスを入力してください"/>
      <select class="search-form__item-select-gender">
        <option value="">性別</option>
      </select>
      <select class="search-form__item-select-category">
        <option value="">お問い合わせの種類</option>
      </select>
      <select class="search-form__item-select-date">
        <option value="">年/月/日</option>
      </select>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-reset" type="submit">リセット</button>
    </div>
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
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
      <tr class="admin-table__row">
        <td class="admin-table__item"></td>
        <td class="admin-table__item">山田　太郎</td>
        <td class="admin-table__item">男性</td>
        <td class="admin-table__item">test@example.com</td>    
        <td class="admin-table__item">商品の交換について</td> 
        <td>
          <div class="admin-form__button">
            <button class="update-form__button-detail" type="submit">
              詳細     
            </button>
          </div>
        <td>
      </tr>
    </table>
  </div>
</div>
@endsection