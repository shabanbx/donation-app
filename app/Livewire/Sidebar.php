<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    // this will track open/closed state
    public bool $isOpen = false;

    // toggle method called by our button
    public function toggle(): void
    {
        $this->isOpen = ! $this->isOpen;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
