<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('review::menus.backend.review.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.review.index') }}">{{ __('review::menus.backend.review.all') }}</a>
                @can('admin.access.review.create')
                {{-- <a class="dropdown-item" href="{{ route('admin.review.create') }}">{{ __('review::menus.backend.review.create') }}</a> --}}
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>