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
                <h2>モーダルタイトル</h2>
                <p>{{ $contactId }}</p>
                <p>名前: {{ $contact_['first_name'] }}</p>
                <button wire:click="closeModal" class="close-button">閉じる</button>
            </div>
        </div>
    @endif
</div>
