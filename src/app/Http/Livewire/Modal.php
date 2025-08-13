<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Modal extends Component
{
    protected $listeners = ['openModal'];

    public $showModal = false;
    public $gender;
 
    public function openModal($gender)
    {
        dd($gender); // ← イベントが届いていればここで停止する

        $this->gender = $gender;
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
