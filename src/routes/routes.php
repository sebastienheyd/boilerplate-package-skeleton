<?php

$default = [
    'prefix'     => config('boilerplate.app.prefix', '').'/~package',
    'domain'     => config('boilerplate.app.domain', ''),
    'middleware' => [
        'web',
        'boilerplatelocale',
        'boilerplateauth',
        'ability:admin,backend_access,~sc:package_access'
    ],
    'as'         => '~package.',
    'namespace'  => '\~uc:vendor\~uc:package\Controllers',
];

Route::group($default, function () {
    Route::resource('~resource', '~uc:resourceController');
    Route::post('~resource/datatable', ['as' => '~resource.datatable', 'uses' => '~uc:resourceController@datatable']);
});
