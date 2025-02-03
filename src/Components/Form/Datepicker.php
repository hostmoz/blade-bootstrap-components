<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;
use Hostmoz\BladeBootstrapComponents\Components\HandlesDefaultAndOldValue;
use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;

class Datepicker extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public string $name;
    public string $label;
    public ?string $value;
    public string $dateFormat;
    public string $altFormat;
    public bool $required;

    public function __construct(
        string $name = 'date_picker',
        string $label = '',
        ?string $value = null,
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true,
        bool $required = false,
        string $dateFormat = 'Y-m-d',
        string $altFormat = 'd/m/Y'
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->dateFormat = $dateFormat;
        $this->altFormat = $altFormat;

        $this->setValue($name, $bind, $default, $language);
    }
}
