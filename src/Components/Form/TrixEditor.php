<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;
use Hostmoz\BladeBootstrapComponents\Components\HandlesDefaultAndOldValue;
use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;

class TrixEditor extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public string $name;
    public string $label;
    public string $type;
    public $required = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        public ?string $value = '',
        string $label = '',

        string $type = 'text',

        $required = false,
        $bind = null,
        $default = null,
        bool $showErrors = true
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->showErrors = $showErrors;
        $this->required = $required;
        $this->setValue($name, $bind, $default ?? $value);
    }
}
