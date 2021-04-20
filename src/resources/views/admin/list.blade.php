@extends('boilerplate::layout.index', [
    'title' => __('~package::~resource.title'),
    'subtitle' => __('~package::~resource.list'),
    'breadcrumb' => [
        __('~package::~resource.title'),
    ]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="btn-group float-right">
                <a href="{{ route("~package.~resource.create") }}" class="btn btn-primary">
                    @lang('~package::~resource.create')
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        <div class="table-responsive">
            <table class="table table-striped table-hover va-middle" id="~pl:resource-table">
                <thead>
                    <tr>
                        <th>@lang('~package::~resource.id')</th>
                        <th>@lang('~package::~resource.label')</th>
                        <th>{{-- buttons --}}</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    @endcomponent
@endsection

@include('boilerplate::load.datatables')

@push('js')
    <script>
        dTable = $('#~pl:resource-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{!! route('~package.~resource.datatable') !!}',
                type: 'post',
            },
            order: [[0, 'desc']],
            columns: [
                {data: 'id', name: 'id', width: '10px'},
                {data: 'label', name: 'label'},
                {
                    data: 'buttons',
                    name: 'buttons',
                    orderable: false,
                    searchable: false,
                    width: '60px',
                    class: "visible-on-hover text-nowrap"
                }
            ]
        })

        $(document).on('click', 'button[data-action=show]', function (e) {
            $.ajax({
                url: $(this).data('href'),
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

        $(document).on('click', 'button[data-action=delete]', function (e) {
            e.preventDefault()
            let url = $(this).data('href')
            bootbox.confirm("@lang('~package::~resource.delete_confirm')", function (res) {
                if (res === false) {
                    return
                }

                $.ajax({
                    url: url,
                    type: 'delete',
                    success: function (res) {
                        if (res.success) {
                            dTable.ajax.reload()
                            growl("@lang('~package::~resource.delete_success')", "success")
                        }
                    }
                })
            })
        })
    </script>
@endpush
