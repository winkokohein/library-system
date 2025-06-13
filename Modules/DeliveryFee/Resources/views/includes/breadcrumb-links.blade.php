<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('deliveryfee::menus.backend.deliveryfee.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.deliveryfee.index') }}">{{ __('deliveryfee::menus.backend.deliveryfee.all') }}</a>
                @can('admin.access.deliveryfee.create')
                <a class="dropdown-item" href="{{ route('admin.deliveryfee.create') }}">{{ __('deliveryfee::menus.backend.deliveryfee.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>