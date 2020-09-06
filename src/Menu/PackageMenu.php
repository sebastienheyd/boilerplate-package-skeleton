<?php

namespace App\Menu;

use Sebastienheyd\Boilerplate\Menu\Builder;

class packageMenu
{
    public function make(Builder $menu)
    {
        $menu->add(__(':package::menu.title'), [
            'permission' => 'backend_access,:sc:package_access',
            'icon'       => 'square'
        ])
            ->id(':sc:package_menu')
            ->activeIfRoute(':package.*')
            ->order(100);

        $menu->addTo(':sc:package_menu', __(':package::menu.index'), [
            'route'      => ':package.index',
            'permission' => 'backend_access,:sc:package_access'
        ])->activeIfRoute(['boilerplate.dashboard']);

        $menu->addTo(':sc:package_menu', __(':package::menu.add'), [
            'route'      => ':package.create',
            'permission' => 'backend_access,:sc:package_access'
        ])->activeIfRoute(['boilerplate.dashboard']);
    }
}
