@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('book::labels.backend.book.management'))

@section('breadcrumb-links')
    @include('book::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css") }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('book::labels.backend.book.management') }} <small class="text-muted">{{ __('book::labels.backend.book.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('book::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="book-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('book::labels.backend.book.table.id') }}</th>
                            <th>{{ __('book::labels.backend.book.table.name') }}</th>
                            <th>{{ __('book::labels.backend.book.table.author') }}</th>
                            <th>{{ __('book::labels.backend.book.table.book_category') }}</th>
                            <th>{{ __('book::labels.backend.book.table.borrow_amount') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("js/backend/plugin/datatables/dataTables.min.js") }}
    {{ script("js/backend/plugin/datatables/dataTables.bootstrap4.min.js") }}
    <!-- {{ script("js/backend/plugin/datatables/dataTables-extend.js") }} -->
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#book-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.book.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'book_name', name: 'name'},
                    {data: 'author_id', name: 'author_id'},
                    {data: 'book_category_id', name: 'book_category_id'},
                    {data: 'borrow_amount', name: 'borrow_amount'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    load_plugins();
                }
            });
        });
    </script>
@endpush