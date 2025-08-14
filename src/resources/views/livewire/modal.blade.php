<div>
    <!-- モーダルを開くボタン -->
    <button wire:click="openModal" class="open-button">モーダルを開く</button>

    <!-- モーダル表示 -->
    @if($showModal)
        <div class="modal-overlay">
            <div class="modal-content">
                <h2>モーダルタイトル</h2>
                <p>これはモーダルの内容です。</p>
                <button wire:click="closeModal" class="close-button">閉じる</button>
            </div>
        </div>
    @endif
</div>
