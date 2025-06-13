@extends ('backend.layouts.app')

@section ('title', __('borrow::labels.backend.borrow.management'))

@section('breadcrumb-links')
    @include('borrow::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('borrow::labels.backend.borrow.management') }}
                    <small class="text-muted">{{ __('borrow::labels.backend.borrow.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('borrow::labels.backend.borrow.table.customer') }}</th>
                       <td>{{ $borrow->customer->name }}</td>
                    </tr>
                    <tr>
                       <th style="width: 20%;">{{ __('borrow::labels.backend.borrow.table.borrow_date') }}</th>
                       <td>{{ $borrow->borrow_date }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('borrow::labels.backend.borrow.table.due_date') }}</th>
                        <td>{{ $borrow->due_date }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('borrow::labels.backend.borrow.table.delivery_fee') }}</th>
                        <td>{{ $borrow->delivery_fee }}</td>
                     </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('borrow::labels.backend.borrow.table.payment_type') }}</th>
                        <td>{{ $borrow->payment_method }}</td>
                    </tr>
                    
                    {{-- <tr>
                        <th style="width: 20%;">{{ __('borrow::labels.backend.borrow.table.active') }}</th>
                        <td>{!! ($borrow->active)?'<label class="badge badge-success" >YES</label>':'<label class="badge badge-danger" >NO</label>' !!}</td>
                    </tr> --}}
                </table>  
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('borrow::labels.backend.borrow.table.created') }}:</strong> {{ $borrow->updated_at->timezone(get_user_timezone()) }} ({{ $borrow->created_at->diffForHumans() }}),
                    <strong>{{ __('borrow::labels.backend.borrow.table.last_updated') }}:</strong> {{ $borrow->created_at->timezone(get_user_timezone()) }} ({{ $borrow->updated_at->diffForHumans() }})
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