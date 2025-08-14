<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>

  <!-- 検索フォーム -->
  <form class="search-form" wire:submit.prevent="search">
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" wire:model="name_email" placeholder="名前やメールアドレスを入力してください"/>
      <select class="search-form__item-select-gender" wire:model="gender">
        <option value="">性別</option>
          <option value=1>男性</option>
          <option value=2>女性</option>
          <option value=3>その他</option>
      </select>
      <select class="search-form__item-select-category" wire:model="category_id">
        <option value="">お問い合わせの種類</option>


        
      </select>
      <input type="date" class="search-form__item-select-date" wire:model="date">
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
                <!-- モーダルを開くボタン -->
                <button wire:click="openModal ({{ $contact->id }})" class="open-button">
                詳細
                </button>
            </div>
            <td>
        </tr>
        @endforeach
        </table>

    </div>

    <!-- モーダル表示 -->
    @if($showModal)
        <div class="modal-overlay">
          <div class="modal-content">
            <button wire:click="closeModal()" type="button" class="modal-close">
                ×
            </button>
              <table class="modal__content">
                <tr class="modal-inner">
                    <th class="modal-ttl">お名前</th>
                    <td class="modal-data">
                        {{ $contact_modal['last_name'] }}
                        <span class="space"></span>
                        <span class="firstName">{{ $contact_modal['first_name'] }}</span>
                    </td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">性別</th>
                    <td class="modal-data">
                        <input type="hidden" value="{{ $contact_modal['gender'] }}" />
                        <?php
                        if ($contact_modal['gender'] == '1') {
                            echo '男性';
                        } elseif ($contact_modal['gender'] == '2') {
                            echo '女性';
                        } else {
                            echo 'その他';
                        }
                        ?>
                    </td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">メールアドレス</th>
                    <td class="modal-data">{{ $contact_modal['email'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">電話番号</th>
                    <td class="modal-data">{{ $contact_modal['tel'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">住所</th>
                    <td class="modal-data">{{ $contact_modal['address'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">建物名</th>
                    <td class="modal-data">{{ $contact_modal['building'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">お問い合わせの種類</th>
                    <td class="modal-data">{{ $contact_modal['category']['content'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl--last">お問い合わせ内容</th>
                    <td class="modal-data--last">
                        {{ $contact_modal['detail']}}
                    </td>
                </tr>
              </table>
              <form class="delete-form" action="/delete" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{ $contact_modal['id'] }}" />
                <button class="delete-btn">削除</button>
              </form>
          </div>
      </div>
    @endif
</div>
