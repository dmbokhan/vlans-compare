<?php

namespace Dmbokhan\VlansCompare\Providers;

use Illuminate\Support\ServiceProvider;

use App\Plugins\Hooks\MenuEntryHook;
use App\Plugins\PluginManager;
use Illuminate\Support\Facades\Route;
use Dmbokhan\VlansCompare\Hooks\MenuHook;


class VlansCompareServiceProvider extends ServiceProvider
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
    public function boot(PluginManager $manager)
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/vlans-compare.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'vlans-compare');

        $name = 'vlans-compare';
        $manager->publishHook($name,MenuEntryHook::class, MenuHook::class);
    }
}
