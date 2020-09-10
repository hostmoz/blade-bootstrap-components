<?php

namespace Backstageel\BladeBootstrapComponents\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;
use Backstageel\BladeBootstrapComponents\FormDataBinder;

abstract class Component extends BaseComponent
{
    /**
     * {@inheritDoc}
     */
    public function render()
    {
        return function (array $data) {

            $prefix = config('blade-bootstrap-components.prefix');
            $alias = Str::of($data['componentName']);
            if($alias->startsWith($prefix.'::')){
                $alias = $alias->replace($prefix.'::','blade-bootstrap-components::');
            } else{
                $alias = $alias->prepend('blade-bootstrap-components::');
            }

            return (string)$alias;
        };

    }

    /**
     * Returns a boolean wether the form is wired to a Livewire component.
     *
     * @return boolean
     */
    public function isWired(): bool
    {
        return app(FormDataBinder::class)->isWired();
    }

    /**
     * The inversion of 'isWired()'.
     *
     * @return boolean
     */
    public function isNotWired(): bool
    {
        return !$this->isWired();
    }
}
