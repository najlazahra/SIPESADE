<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class AnnouncementList extends Component
{
    public $category = 'Semua';

    public function setCategory($name)
    {
        $this->category = $name;
    }

    public function render()
    {
        $query = Announcement::latest();
        if ($this->category !== 'Semua') {
            $query->where('category', $this->category);
        }

        return view('livewire.announcement-list', [
            'announcements' => $query->get()
        ]);
    }
}