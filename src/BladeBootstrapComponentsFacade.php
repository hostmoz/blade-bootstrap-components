<?php

namespace Hostmoz\BladeBootstrapComponents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hostmoz\BladeBootstrapComponents\Skeleton\SkeletonClass
 */
class BladeBootstrapComponentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blade-bootstrap-components';
    }
}
