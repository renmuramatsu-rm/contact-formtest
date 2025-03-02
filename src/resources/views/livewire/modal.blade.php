<div wire:key="modal">
    

    <p>DEBUG: showModal の値 → {{ $showModal ? '表示中' : '非表示' }}</p>

    @if ($showModal)
    <div class="modal-overlay" wire:click="closeModal"></div>
    <div class="modal-container">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">お問い合わせ詳細</h5>
                <button type="button" class="close" wire:click="closeModal">×</button>
            </div>
            <div class="modal-body">
                @if ($contact)
                <p><strong>ID:</strong> {{ $contact->id }}</p>
                <p><strong>名前:</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
                <p><strong>メール:</strong> {{ $contact->email }}</p>
                <p><strong>性別:</strong> {{ $contact->gender }}</p>
                <p><strong>カテゴリ:</strong> {{ $contact->category->content ?? 'なし' }}</p>
                <p><strong>メッセージ:</strong> {{ $contact->message }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">閉じる</button>
            </div>
        </div>
    </div>
    @endif
</div>