<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('bookcategory::menus.backend.bookcategory.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.bookcategory.index') }}">{{ __('bookcategory::menus.backend.bookcategory.all') }}</a>
                @can('admin.access.bookcategory.create')
                <a class="dropdown-item" href="{{ route('admin.bookcategory.create') }}">{{ __('bookcategory::menus.backend.bookcategory.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>