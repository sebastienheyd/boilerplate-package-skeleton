@extends('boilerplate::layout.index', [
    'title' => __('~package::~resource.title'),
    'subtitle' => __('~package::~resource.edit'),
    'breadcrumb' => [
        __('~package::~resource.title') => '~package.~resource.index',
        __('~package::~resource.edit')
    ]
])

@section('content')
    {!! Form::open(['route' => ['~package.~resource.update', $~resource], 'method' => 'patch', 'autocomplete'=> 'off', 'id' => '~resource-form']) !!}
        <div class="row py-2">
            <div class="col-12">
                @include('~package::~resource.formButtons')
            </div>
        </div>
        <div class="row">
            @include('~package::~resource.form')
        </div>
    {!! Form::close() !!}
@endsection
