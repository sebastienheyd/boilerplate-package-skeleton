@extends('boilerplate::layout.index', [
    'title' => __('~package::resource.~resource.title'),
    'subtitle' => __('~package::resource.~resource.list'),
    'breadcrumb' => [
        __('~package::resource.~resource.title'),
    ]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="btn-group float-right">
                <a href="{{ route("~package.~resource.create") }}" class="btn btn-primary">
                    @lang('~package::resource.~resource.create')
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => '~resources'])@endcomponent
    @endcomponent
@endsection

@push('js')
@component('boilerplate::minify')
    <script>
        $(document).on('click', 'a.show-~resource', function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('href'),
                type: 'get',
                success: function (res) {
                    bootbox.dialog({
                        onEscape: true,
                        size: 'xl',
                        message: res
                    })
                }
            })
        })

        $(document).on('click', 'a.delete-~resource', function (e) {
            e.preventDefault()
            let url = $(this).attr('href')
            bootbox.confirm("@lang('~package::resource.~resource.delete_confirm')", function (res) {
                if (res === false) {
                    return
                }

                $.ajax({
                    url: url,
                    type: 'delete',
                    success: function (res) {
                        if (res.success) {
                            dt~uc:resources.ajax.reload();
                            growl("@lang('~package::resource.~resource.delete_success')", "success")
                        }
                    }
                })
            })
        })
    </script>
@endcomponent
@endpush
