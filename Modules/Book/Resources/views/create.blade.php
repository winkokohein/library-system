@extends ('backend.layouts.app')

@section ('title', __('book::labels.backend.book.management') . ' | ' . __('book::labels.backend.book.create'))

@section('breadcrumb-links')
    @include('book::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->form('POST', route('admin.book.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('book::labels.backend.book.management') }}
                        <small class="text-muted">{{ __('book::labels.backend.book.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('book::labels.backend.book.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('book_name')
                                ->class('form-control')
                                ->placeholder(__('book::labels.backend.book.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('book::labels.backend.book.table.author'))->class('col-md-2 form-control-label')->for('author') }}

                        <div class="col-md-10">
                            <select name="author_id" id="author" class="form-control author-name" required="required">
                                <option></option>
                                @foreach ($authors as $key => $author)
                                    <option value="{{ $author->id }}" name="author_id" {{ $author == old('author') ? ' selected' : ''}}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('book::labels.backend.book.table.book_category'))->class('col-md-2 form-control-label')->for('book_category') }}

                        <div class="col-md-10">
                            <select name="book_category_id" id="book_category" class="form-control book-category-name" required="required">
                                <option></option>
                                @foreach ($book_categories as $key => $book_category)
                                    <option value="{{ $book_category->id }}" name="book_category_id" {{ $book_category == old('book_category') ? ' selected' : ''}}>{{ $book_category->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('book::labels.backend.book.table.published_year'))->class('col-md-2 form-control-label')->for('published_year') }}

                        <div class="col-md-10">
                            {{ html()->text('published_year')
                                ->class('form-control')
                                ->placeholder(__('book::labels.backend.book.table.published_year'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('book::labels.backend.book.table.publisher'))->class('col-md-2 form-control-label')->for('publisher') }}

                        <div class="col-md-10">
                            {{ html()->text('publisher')
                                ->class('form-control')
                                ->placeholder(__('book::labels.backend.book.table.publisher'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('book::labels.backend.book.table.quantity'))->class('col-md-2 form-control-label')->for('quantity') }}

                        <div class="col-md-10">
                            {{ html()->text('quantity')
                                ->class('form-control')
                                ->placeholder(__('book::labels.backend.book.table.quantity'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('book::labels.backend.book.table.summary'))->class('col-md-2 form-control-label')->for('summary') }}

                        <div class="col-md-10">
                            {{ html()->textarea('summary')
                                ->class('form-control')
                                ->placeholder(__('book::labels.backend.book.table.summary'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.book.index'), __('buttons.general.cancel')) }}
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
        $('.author-name').select2({
            placeholder: "Choose Author"
        });
        
        $('.book-category-name').select2({
            placeholder: "Choose Book Category"
        });
    });
</script>
@endpush