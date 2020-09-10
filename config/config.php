<?php
use Backstageel\BladeBootstrapComponents\Components;
/*
 * You can place your custom package configuration in here.
 */
return [
    'prefix' => 'bootstrap',
    'components' => [
        'form' => [
            'view'  => 'blade-bootstrap-components::form',
            'class' => Components\Form::class,
        ],

        'form-checkbox' => [
            'view'  => 'blade-bootstrap-components::form-checkbox',
            'class' => Components\FormCheckbox::class,
        ],

        'form-date-interval' => [
            'view'  => 'blade-bootstrap-components::form-date-interval',
            'class' => Components\FormDateInterval::class,
        ],

        'form-dual-listbox' => [
            'view'  => 'blade-bootstrap-components::form-dual-listbox',
            'class' => Components\FormDualListbox::class,
        ],

        'form-errors' => [
            'view'  => 'blade-bootstrap-components::form-errors',
            'class' => Components\FormErrors::class,
        ],

        'form-group' => [
            'view'  => 'blade-bootstrap-components::form-group',
            'class' => Components\FormGroup::class,
        ],

        'form-input' => [
            'view'  => 'blade-bootstrap-components::form-input',
            'class' => Components\FormInput::class,
        ],

        'form-label' => [
            'view'  => 'blade-bootstrap-components::form-label',
            'class' => Components\FormLabel::class,
        ],

        'form-radio' => [
            'view'  => 'blade-bootstrap-components::form-radio',
            'class' => Components\FormRadio::class,
        ],

        'form-select' => [
            'view'  => 'blade-bootstrap-components::form-select',
            'class' => Components\FormSelect::class,
        ],

        'form-submit' => [
            'view'  => 'blade-bootstrap-components::form-submit',
            'class' => Components\FormSubmit::class,
        ],

        'form-textarea' => [
            'view'  => 'blade-bootstrap-components::form-textarea',
            'class' => Components\FormTextarea::class,
        ],
    ],
];