<div class="col-6">
    @component('boilerplate::card')
        @component('boilerplate::input', ['name' => 'label', 'label' => '~package::resource.~resource.properties.label', 'value' => $~resource->label ?? '', 'autofocus' => true])@endcomponent
    @endcomponent
</div>