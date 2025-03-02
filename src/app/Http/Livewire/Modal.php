<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class Modal extends Component
{
    public $contact;
    public $showModal = false;

    protected $listeners = ['showModal' => 'showModal'];

    public function showModal($contactId)
    {
        Log::info("showModal() が呼ばれました - Contact ID: " . json_encode($contactId));

        if (!$contactId) {
            Log::error("エラー: contactId が渡されていません！");
            return;
        }
        $this->contact = Contact::find($contactId);

        if (!$this->contact) {
            Log::error("Contact ID {$contactId} not found.");
            return;
        }
        Log::info("Contact が見つかりました: "($this->contact));
        $this->showModal = true;
        Log::info("showModal フラグが true に設定されました");

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
