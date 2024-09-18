<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Elements;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class Modal extends Component
{
    public $alias;
    public $size = "modal-lg";
    public $params = [];
    public $activeModal;

    #[On('showModal')]
    public function showModal($data)
    {
        $this->alias = $data['alias'];
        if(isset($data['size'])) {
            $this->size = $data['size'];
        }
        $this->params = $data['params'] ?? [];
        $this->activeModal = "modal-id-" . rand();
        $this->dispatch('showBootstrapModal');
    }

    #[On('resetModal')]
    public function resetModal()
    {
        $this->reset();
    }

    public function render()
    {
        return view('blade-bootstrap-components::elements.modal');
    }
}