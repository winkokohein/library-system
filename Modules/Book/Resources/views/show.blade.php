@extends ('backend.layouts.app')

@section ('title', __('book::labels.backend.book.management'))

@section('breadcrumb-links')
    @include('book::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('book::labels.backend.book.management') }}
                    <small class="text-muted">{{ __('book::labels.backend.book.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('book::labels.backend.book.table.name') }}</th>
                       <td>{{ $book->book_name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('book::labels.backend.book.table.author') }}</th>
                        <td>{{ $book->author->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('book::labels.backend.book.table.book_category') }}</th>
                        <td>{{ $book->bookCategory->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('book::labels.backend.book.table.published_year') }}</th>
                        <td>{{ $book->published_year }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('book::labels.backend.book.table.publisher') }}</th>
                        <td>{{ $book->publisher }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('book::labels.backend.book.table.borrow_amount') }}</th>
                        <td>{{ $book->borrow_amount }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('book::labels.backend.book.table.quantity') }}</th>
                        <td>{{ $book->quantity }}</td>
                    </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('book::labels.backend.book.table.created') }}:</strong> {{ $book->updated_at->timezone(get_user_timezone()) }} ({{ $book->created_at->diffForHumans() }}),
                    <strong>{{ __('book::labels.backend.book.table.last_updated') }}:</strong> {{ $book->created_at->timezone(get_user_timezone()) }} ({{ $book->updated_at->diffForHumans() }})
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