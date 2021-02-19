<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;
use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;
use Hostmoz\BladeBootstrapComponents\Components\HandlesBoundValues;

class AutoComplete extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;

    public string $name;
    public string $label;
    public $options;
    public $selectedKey;
    public bool $multiple;
    public string $url;
    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $url,
        string $label = '',
        string $id = '',
        $options = [],
        $bind = null,
        $default = null,
        bool $multiple = false,
        bool $showErrors = true
    ) {
        $this->name    = $name;
        $this->label   = $label;
        $this->options = $options;
        $this->url = $url;

        if ($this->isNotWired()) {
            $default = $this->getBoundValue($bind, $name) ?: $default;

            $this->selectedKey = old($name, $default);
        }

        $this->multiple   = $multiple;
        $this->showErrors = $showErrors;
        $this->id = $id;
    }

    public function isSelected($key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        if ($this->selectedKey === $key) {
            return true;
        }

        if (is_array($this->selectedKey) && in_array($key, $this->selectedKey)) {
            return true;
        }

        return false;
    }
}
