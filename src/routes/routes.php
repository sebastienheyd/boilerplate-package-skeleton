<?php

use \~uc:vendor\~uc:package\Controllers\~uc:resourceController;

$default = [
    'prefix'     => config('boilerplate.app.prefix', '').'/~package',
    'domain'     => config('boilerplate.app.domain', ''),
    'as'         => '~package.',
    'middleware' => [
        'web',
        'boilerplatelocale',
        'boilerplateauth',
        'ability:admin,backend_access,~sc:package_access'
    ],
];

Route::group($default, function () {
    Route::resource('~resource', ~uc:resourceController::class);
});
