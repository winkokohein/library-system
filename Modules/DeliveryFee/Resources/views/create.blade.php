@extends ('backend.layouts.app')

@section ('title', __('deliveryfee::labels.backend.deliveryfee.management') . ' | ' . __('deliveryfee::labels.backend.deliveryfee.create'))

@section('breadcrumb-links')
    @include('deliveryfee::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->form('POST', route('admin.deliveryfee.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('deliveryfee::labels.backend.deliveryfee.management') }}
                        <small class="text-muted">{{ __('deliveryfee::labels.backend.deliveryfee.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('customer::labels.backend.customer.table.township'))->class('col-md-2 form-control-label')->for('township') }}

                        <div class="col-md-4">
                            <select name="township_id" id="township" class="form-control township-name" required="required">
                                <option></option>
                                @foreach ($townships as $key => $township)
                                    <option value="{{ $township->id }}" name="township_id" {{ $township == old('township') ? ' selected' : ''}}>{{ $township->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('deliveryfee::labels.backend.deliveryfee.table.amount'))->class('col-md-2 form-control-label')->for('amount') }}

                        <div class="col-md-4">
                            {{ html()->text('amount')
                                ->class('form-control')
                                ->placeholder(__('deliveryfee::labels.backend.deliveryfee.table.amount'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.deliveryfee.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')
{{ script('assets/plugins/select2/js/select2.full.min.js')}}
{{ script("assets/plugins/select2/component/components-select2.js") }}

<script>
    $(document).ready(function() {
        
        $('.township-name').select2({
            placeholder: "Choose Township"
        });
    });

</script>
@endpush