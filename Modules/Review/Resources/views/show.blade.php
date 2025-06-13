@extends ('backend.layouts.app')

@section ('title', __('review::labels.backend.review.management'))

@section('breadcrumb-links')
    @include('review::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('review::labels.backend.review.management') }}
                    <small class="text-muted">{{ __('review::labels.backend.review.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('review::labels.backend.review.table.created') }}:</strong> {{ $review->updated_at->timezone(get_user_timezone()) }} ({{ $review->created_at->diffForHumans() }}),
                    <strong>{{ __('review::labels.backend.review.table.last_updated') }}:</strong> {{ $review->created_at->timezone(get_user_timezone()) }} ({{ $review->updated_at->diffForHumans() }})
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