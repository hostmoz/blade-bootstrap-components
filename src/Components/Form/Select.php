<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;
use Hostmoz\BladeBootstrapComponents\Components\HandlesDefaultAndOldValue;
use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;
use Hostmoz\BladeBootstrapComponents\Components\HandlesBoundValues;
use Illuminate\Support\Arr;

class Select extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;
    use HandlesDefaultAndOldValue;

    public string $name;
    public string $label;
    public $options;
    public $empty=false;
    public $selectedKey;
    public bool $multiple;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        $options = [],
        $bind = null,
        $default = null,
        $selected =null,
        bool $multiple = false,
        bool $showErrors = true,
        bool $empty = true,
        public $required=false
    ) {
        $this->name    = $name;
        $this->label   = $label;
        $this->options = $options;

        $this->empty = $empty;

        if ($this->isNotWired()) {
            $default = $this->getBoundValue($bind, $name) ?: $default;
            $default = $selected ?: $default;
            $named = $this->convertBracketsToDotNotation($name);
            $this->selectedKey = old($named, $default);

        }

        $this->multiple   = $multiple;
        $this->showErrors = $showErrors;
    }

    public function isSelected($key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        return in_array($key, Arr::wrap($this->selectedKey));
    }
}
