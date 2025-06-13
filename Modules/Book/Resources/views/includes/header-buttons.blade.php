@can('admin.access.book.create')
<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.book.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="{{ __('book::menus.backend.book.create') }}"><i class="fas fa-plus-circle"></i></a>
</div>
<!--btn-toolbar-->
@endcan