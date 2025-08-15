@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
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
    </form>

    <form class="search-form" action="/admin/search" method="get">
    @csrf
        <input type="hidden" name="name_email" value="">
        <input type="hidden" name="gender" value="">
        <input type="hidden" name="category_id" value="">
        <input type="hidden" name="date" value="">
        <div class="search-form__button">
            <button class="search-form__button-reset" type="submit">リセット</button>
        </div>
    </form>

  <!-- エクスポートとページ送り -->
    <div class="admin__additional__features">
        <form method="get" class="additional__features__button" action="{{ route('users.export') }}">
            <input type="hidden" name="name_email" value="{{ old('name_email', $name_email ??'') }}">
            <input type="hidden" name="gender" value="{{ old('gender', $gender ??'') }}">
            <input type="hidden" name="category_id" value="{{ old('category_id', $category_id ??'') }}">
            <input type="hidden" name="date" value="{{ old('date', $date ??'') }}">
            <button class="additional__features-export" type="submit">エクスポート</button>
        </form>
        <div class="additional__features-pagination">
            {{ $contacts->links('vendor.pagination.custom') }}
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
                        <a href="#modal-{{ $contact['id'] }}" class="admin-form__button-modal-open">詳細</a>
                    </div>
                    <div class="modal" id="modal-{{ $contact['id'] }}">
                        <div class="modal-wrapper">
                            <div class="modal-content">
                                <a href="#" class="close">&times;</a>
                                <table class="modal__content">
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">お名前</th>
                                            <td class="modal-data">
                                                {{ $contact['last_name'] }}
                                            <span class="space"></span>
                                            <span class="firstName">{{ $contact['first_name'] }}</span>
                                        </td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">性別</th>
                                        <td class="modal-data">
                                            <input type="hidden" value="{{ $contact['gender'] }}" />
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
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">メールアドレス</th>
                                        <td class="modal-data">{{ $contact['email'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">電話番号</th>
                                        <td class="modal-data">{{ $contact['tel'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">住所</th>
                                        <td class="modal-data">{{ $contact['address'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">建物名</th>
                                        <td class="modal-data">{{ $contact['building'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">お問い合わせの種類</th>
                                        <td class="modal-data">{{ $contact['category']['content'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl--last">お問い合わせ内容</th>
                                        <td class="modal-data--last">{{ $contact['detail']}}</td>
                                    </tr>
                                </table>
                                <form class="delete-form" action="/delete" method="post">
                                @method('delete')
                                @csrf
                                    <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                                    <button class="delete-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection