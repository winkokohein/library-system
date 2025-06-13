@extends ('backend.layouts.app')

@section ('title', __('customer::labels.backend.customer.management') . ' | ' . __('customer::labels.backend.customer.create'))

@section('breadcrumb-links')
    @include('customer::includes.breadcrumb-links')
@endsection

@push('after-styles')
{{ style('assets/plugins/daterangepicker/daterangepicker.css') }}
{{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}

@endpush

@section('content')
{{ html()->form('POST', route('admin.customer.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('customer::labels.backend.customer.management') }}
                        <small class="text-muted">{{ __('customer::labels.backend.customer.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('customer::labels.backend.customer.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-4">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('customer::labels.backend.customer.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('customer::labels.backend.customer.table.mobile_no').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('mobile_no') }}
    
                            <div class="col-md-4">
                                {{ html()->number('mobile_no')
                                    ->class('form-control')
                                    ->placeholder(__('customer::labels.backend.customer.table.mobile_no'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('customer::labels.backend.customer.table.city'))->class('col-md-2 form-control-label')->for('city') }}

                        <div class="col-md-4">
                            <select name="city_id" id="city" class="form-control city-name" required="required">
                                <option></option>
                                @foreach ($cities as $key => $city)
                                    <option value="{{ $city->id }}" name="city_id" {{ $city == old('city') ? ' selected' : ''}}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

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
                    {{ html()->label(__('customer::labels.backend.customer.table.address'))->class('col-md-2 form-control-label')->for('address') }}

                        <div class="col-md-4">
                            {{ html()->text('address')
                                ->class('form-control')
                                ->placeholder(__('customer::labels.backend.customer.table.address'))
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
                    {{ form_cancel(route('admin.customer.index'), __('buttons.general.cancel')) }}
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

{{ script("assets/plugins/daterangepicker/moment.min.js") }}
{{ script("assets/plugins/daterangepicker/daterangepicker.min.js") }}
<script>
    $(document).ready(function() {
        $('.city-name').select2({
            placeholder: "Choose City"
        });
        
        $('.township-name').select2({
            placeholder: "Choose Township"
        });
    });

    $(function() {
      $('#start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2000,
        maxYear: parseInt(moment().format('YYYY'),10),
        autoUpdateInput: false,
        }, function(chosen_date) {
        $('#start_date').val(chosen_date.format('DD-MM-YYYY'));
      });

      $('#end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: false,
        minYear: 2000,
        maxYear: parseInt(moment().format('YYYY'),10),
        autoUpdateInput: false,
        }, function(chosen_date) {
        $('#end_date').val(chosen_date.format('DD-MM-YYYY'));
      });

    });
</script>
@endpush