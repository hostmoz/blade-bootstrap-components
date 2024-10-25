<?php
use Hostmoz\BladeBootstrapComponents\Components;
return [
    'prefix' => 'bootstrap',
    'include_js' => true,

    'component_defaults' => [
        'close_modal_on_click_away' => true,

        'close_modal_on_escape' => true,

        'close_modal_on_escape_is_forceful' => true,

        'dispatch_close_event' => false,

        'destroy_on_close' => false,
    ],
];
