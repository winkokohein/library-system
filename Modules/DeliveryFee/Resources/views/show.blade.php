@extends ('backend.layouts.app')

@section ('title', __('deliveryfee::labels.backend.deliveryfee.management'))

@section('breadcrumb-links')
    @include('deliveryfee::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('deliveryfee::labels.backend.deliveryfee.management') }}
                    <small class="text-muted">{{ __('deliveryfee::labels.backend.deliveryfee.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('deliveryfee::labels.backend.deliveryfee.table.township') }}</th>
                       <td>{{ $deliveryFee->township->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%;">{{ __('deliveryfee::labels.backend.deliveryfee.table.amount') }}</th>
                        <td>{{ $deliveryFee->amount }}</td>
                     </tr>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('deliveryfee::labels.backend.deliveryfee.table.created') }}:</strong> {{ $deliveryFee->updated_at->timezone(get_user_timezone()) }} ({{ $deliveryFee->created_at->diffForHumans() }}),
                    <strong>{{ __('deliveryfee::labels.backend.deliveryfee.table.last_updated') }}:</strong> {{ $deliveryFee->created_at->timezone(get_user_timezone()) }} ({{ $deliveryFee->updated_at->diffForHumans() }})
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