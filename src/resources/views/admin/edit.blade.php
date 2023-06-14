@extends('boilerplate::layout.index', [
    'title' => __('~package::resource.~resource.title'),
    'subtitle' => __('~package::resource.~resource.edit'),
    'breadcrumb' => [
        __('~package::resource.~resource.title') => '~package.~resource.index',
        __('~package::resource.~resource.edit')
    ]
])

@section('content')
    <x-boilerplate::form :route="['~package.~resource.update', $~resource]" method="patch" autocomplete="off" id="~resource-form">
        <div class="row py-2">
            <div class="col-12">
                @include('~package::~resource.formButtons')
            </div>
        </div>
        <div class="row">
            @include('~package::~resource.form')
        </div>
    </x-boilerplate::form>
@endsection
