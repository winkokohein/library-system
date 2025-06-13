@extends ('backend.layouts.app')

@section ('title', __('author::labels.backend.author.management') . ' | ' . __('author::labels.backend.author.edit'))

@section('breadcrumb-links')
    @include('author::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
{{ html()->modelForm($author, 'PATCH', route('admin.author.update', $author->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('author::labels.backend.author.management') }}
                        <small class="text-muted">{{ __('author::labels.backend.author.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('author::labels.backend.author.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('author::labels.backend.author.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('author::labels.backend.author.table.nationality'))->class('col-md-2 form-control-label')->for('nationality') }}

                        <div class="col-md-10">
                            {{ html()->text('nationality')
                                ->class('form-control')
                                ->placeholder(__('author::labels.backend.author.table.nationality'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.author.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')

<script>


</script>
@endpush