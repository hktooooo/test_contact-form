<div>
    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            min-width: 300px;
            max-width: 600px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
    </style>

    <div>
        @if($showModal)
            <div class="modal-overlay" wire:click.self="closeModal">
                <div class="modal-content">
                    <h2>性別: {{ $gender }}</h2>
                    <button wire:click="closeModal">閉じる</button>
                </div>
            </div>
        @endif
    </div>
</div>

