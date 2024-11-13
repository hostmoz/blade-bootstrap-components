<?php

namespace Hostmoz\BladeBootstrapComponents;

use Hostmoz\BladeBootstrapComponents\Components\Elements\Modal;
use Hostmoz\BladeBootstrapComponents\Livewire\DependentSelects;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class BladeBootstrapComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blade-bootstrap-components.php'),
            ], 'bootstrap-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/blade-bootstrap-components'),
            ], 'bootstrap-views');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/bootstrap-components'),
            ], 'bootstrap-assets');
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-bootstrap-components');

        //

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Hostmoz\BladeBootstrapComponents\FormDataBinder::class)->bind(' . $bind . '); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\Hostmoz\BladeBootstrapComponents\FormDataBinder::class)->pop(); ?>';
        });

        Blade::directive('wire', function () {
            return '<?php app(\Hostmoz\BladeBootstrapComponents\FormDataBinder::class)->wire(); ?>';
        });

        Blade::directive('endwire', function () {
            return '<?php app(\Hostmoz\BladeBootstrapComponents\FormDataBinder::class)->endWire(); ?>';
        });

        $prefix = config('blade-bootstrap-components.prefix');

        Blade::componentNamespace('Hostmoz\\BladeBootstrapComponents\\Components', $prefix);
        Livewire::component('bootstrap-modal', Modal::class);
        Livewire::component('bootstrap::dependent-selects', DependentSelects::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blade-bootstrap-components');

        // Register the main class to use with the facade
        $this->app->singleton('blade-bootstrap-components', function () {
            return new BladeBootstrapComponents;
        });
    }
}
