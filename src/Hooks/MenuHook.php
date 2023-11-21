<?php

namespace Dmbokhan\VlansCompare\Hooks;

use App\Plugins\Hooks\MenuEntryHook;

class MenuHook extends MenuEntryHook
{
    public string $view = 'vlans-compare::menu.main';
}
