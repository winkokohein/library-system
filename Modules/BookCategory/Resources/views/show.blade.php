@extends ('backend.layouts.app')

@section ('title', __('bookcategory::labels.backend.bookcategory.management'))

@section('breadcrumb-links')
    @include('bookcategory::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('bookcategory::labels.backend.bookcategory.management') }}
                    <small class="text-muted">{{ __('bookcategory::labels.backend.bookcategory.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('bookcategory::labels.backend.bookcategory.table.name') }}</th>
                       <td>{{ $bookCategory->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('bookcategory::labels.backend.bookcategory.table.description') }}</th>
                        <td>{{ $bookCategory->description }}</td>
                     </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('bookcategory::labels.backend.bookcategory.table.created') }}:</strong> {{ $bookCategory->updated_at->timezone(get_user_timezone()) }} ({{ @$bookCategory->created_at->diffForHumans() }}),
                    <strong>{{ __('bookcategory::labels.backend.bookcategory.table.last_updated') }}:</strong> {{ $bookCategory->created_at->timezone(get_user_timezone()) }} ({{ @$bookCategory->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection

@push('after-scripts')

<script>


</script>
@endpush