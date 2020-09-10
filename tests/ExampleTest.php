<?php

namespace Backstageel\BladeBootstrapComponents\Tests;

use Orchestra\Testbench\TestCase;
use Backstageel\BladeBootstrapComponents\BladeBootstrapComponentsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [BladeBootstrapComponentsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
