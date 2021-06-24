<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;
use Hostmoz\BladeBootstrapComponents\Components\HandlesDefaultAndOldValue;
use Hostmoz\BladeBootstrapComponents\Components\Component;
class Password extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public string $name;
    public string $label;
    public string $type;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        string $type = 'text',
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true
    ) {
        $this->name       = $name;
        $this->label      = $label;
        $this->type       = $type;
        $this->showErrors = $showErrors;

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
