<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('borrow::menus.backend.borrow.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.borrow.index') }}">{{ __('borrow::menus.backend.borrow.all') }}</a>
                @can('admin.access.borrow.create')
                {{-- <a class="dropdown-item" href="{{ route('admin.borrow.create') }}">{{ __('borrow::menus.backend.borrow.create') }}</a> --}}
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>