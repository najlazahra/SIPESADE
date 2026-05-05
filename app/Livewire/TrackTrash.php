<?php

namespace App\Livewire;

use App\Models\Trash;
use Livewire\Component;

class TrackTrash extends Component
{
    public $search = '';
    public $result = null;

    public function checkStatus()
    {
        $this->validate([
            'search' => 'required|min:1',
        ]);

        // Mencari data berdasarkan ID primer atau kolom khusus jika ada
        $this->result = Trash::where('id', $this->search)->first();
        
        if (!$this->result) {
            session()->flash('error', 'ID Penjemputan tidak ditemukan.');
        }
    }

    public function render()
    {
        return view('livewire.track-trash');
    }
}