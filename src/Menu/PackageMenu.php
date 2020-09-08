<?php

namespace ~uc:vendor\~uc:package\Menu;

use Sebastienheyd\Boilerplate\Menu\Builder;

class ~uc:packageMenu
{
    public function make(Builder $menu)
    {
        $menu->add(__('~package::menu.title'), [
            'permission' => 'backend_access,~sc:package_access',
            'icon'       => 'cube'     // https://fontawesome.com/icons?d=gallery&m=free
        ])->id('~sc:package_menu')->activeIfRoute('~package.~resource.*')->order(100);

        $menu->addTo('~sc:package_menu', __('~package::menu.index'), [
            'route'      => '~package.~resource.index',
            'permission' => 'backend_access,~sc:package_access'
        ])->activeIfRoute(['~package.~resource.index', '~package.~resource.edit']);

        $menu->addTo('~sc:package_menu', __('~package::menu.add'), [
            'route'      => '~package.~resource.create',
            'permission' => 'backend_access,~sc:package_access'
        ])->activeIfRoute(['~package.~resource.add']);
    }
}
