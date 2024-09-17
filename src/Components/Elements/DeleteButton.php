<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Elements;

use Hostmoz\BladeBootstrapComponents\Components\Component;

class DeleteButton extends Component
{
    public $confirm = 'Tem certeza que deseja excluir este recurso humano?';

    public function __construct(public string $name,public string $label, public string $action='#'){

    }
}
