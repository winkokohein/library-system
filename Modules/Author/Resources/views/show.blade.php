@extends ('backend.layouts.app')

@section ('title', __('author::labels.backend.author.management'))

@section('breadcrumb-links')
    @include('author::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('author::labels.backend.author.management') }}
                    <small class="text-muted">{{ __('author::labels.backend.author.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('author::labels.backend.author.table.name') }}</th>
                       <td>{{ $author->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('author::labels.backend.author.table.nationality') }}</th>
                        <td>{{ $author->nationality }}</td>
                     </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('author::labels.backend.author.table.created') }}:</strong> {{ $author->updated_at->timezone(get_user_timezone()) }} ({{ $author->created_at->diffForHumans() }}),
                    <strong>{{ __('author::labels.backend.author.table.last_updated') }}:</strong> {{ $author->created_at->timezone(get_user_timezone()) }} ({{ $author->updated_at->diffForHumans() }})
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