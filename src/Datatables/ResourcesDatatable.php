<?php

namespace ~uc:vendor\~uc:package\Datatables;

use ~uc:vendor\~uc:package\Models\~uc:resource;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;

class ~uc:resourcesDatatable extends Datatable
{
    public $slug = '~resources';

    public function datasource()
    {
        return ~uc:resource::query();
    }

    public function setUp()
    {
        $this->order('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::add(__('~package::resource.~resource.properties.id'))
                ->width('80px')
                ->data('id'),

            Column::add(__('~package::resource.~resource.properties.label'))
                ->data('label'),

            Column::add(__('Created at'))
                ->width('180px')
                ->data('created_at')
                ->dateFormat(),

            Column::add(__('Updated at'))
                ->width('180px')
                ->data('updated_at')
                ->dateFormat(),

            Column::add()
                ->width('20px')
                ->actions(function (~uc:resource $~resource) {
                    return implode([
                        Button::add()
                            ->route('~package.~resource.show', $~resource)
                            ->class('show-~resource')
                            ->color('default')
                            ->icon('eye')
                            ->make(),

                        Button::add()
                            ->route('~package.~resource.edit', $~resource)
                            ->class('edit-~resource')
                            ->color('primary')
                            ->icon('pencil-alt')
                            ->make(),

                        Button::add()
                            ->route('~package.~resource.destroy', $~resource)
                            ->class('delete-~resource')
                            ->color('danger')
                            ->icon('trash')
                            ->make(),
                    ]);
                }),
        ];
    }
}