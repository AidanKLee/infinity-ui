<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('attributes', function ($expression) {
            $expression = !empty($expression) ? ', '.$expression : '';
            return "<?php echo attributes(\$attributes$expression); ?>";
        });

        Blade::directive('alpineInitialValue', function () {
            return "<?php echo \$attributes->has('wire:model') ? 'x-init=xinit(\$wire.' . \$attributes->get('wire:model') . ')' : ''; ?>";
        });

        Blade::if('isArray', function ($value) {
            return is_array($value);
        });

        Blade::if('empty', function ($value) {
            return empty($value);
        });

        Blade::if('notEmpty', function ($value) {
            return !empty($value);
        });
    }
}