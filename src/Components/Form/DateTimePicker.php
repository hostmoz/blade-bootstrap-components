<?php

    namespace Hostmoz\BladeBootstrapComponents\Components\Form;

    use Hostmoz\BladeBootstrapComponents\Components\Component;
    use Hostmoz\BladeBootstrapComponents\Components\HandlesDefaultAndOldValue;
    use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;

    class DateTimePicker extends Component
    {
        use HandlesValidationErrors;
        use HandlesDefaultAndOldValue;

        public string $label = '';
        public string $name = '';
        public ?string $value = '';

        /**
         * Create a new component instance.
         *
         * @return void
         */
        public function __construct(
            string $name = 'date_time_picker',
            string $label = '',
            string $value = '',
            $bind = null,
            $default = null,
            $language = null,
            bool $showErrors = true
        ) {
            $this->name = $name;
            $this->label = $label;
            $this->value = $value;

            $this->setValue($name, $bind, $default, $language);
        }
    }
