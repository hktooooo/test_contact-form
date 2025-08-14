<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Modal extends Component
{
    public $showModal = false;
    public $name_email;
    public $gender;
    public $category_id;
    public $date;

    public $filters = []; // 検索条件をまとめて保持

    public function openModal($id)
    {
        $this->contactId = $id;
        $this->contact_modal = Contact::with('category')->find($id);
        $this->showModal = true;
        // dd(Contact::with('category')->find($id));
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function search()
    {
        $this->filters = [
            'name_email'  => $this->name_email,
            'gender'      => $this->gender,
            'category_id' => $this->category_id,
            'date'        => $this->date,
        ];
        // dd($this->filters['name_email']);
    }

    public function render()
    {
        $contacts = Contact::with('category')
            ->KeywordSearch($this->filters)
            ->paginate(7); // ページネーションも可能

        return view('livewire.modal', [
            'contacts' => $contacts
        ]);
    }
}
