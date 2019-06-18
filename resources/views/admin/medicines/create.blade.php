@extends('admin.layouts.master')

@section('css')
<link href="{{ asset('admin/assets/plugins/summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="breadcrumb-wrapper">
                    <h1>Thêm thuốc</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.medicines.index') }}">
                                    {{ __('labels.medicine') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Thêm thuốc
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.medicines.store') }}" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Thông tin thuốc</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="input-name">{{ __('labels.name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')is-invalid @enderror" id="input-name"
                                        placeholder="{{ __('labels.name') }}" value="{{ old('name') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="">{{ __('labels.medicine_group') }}</label>
                                    <select class="form-control @error('medicine_group_id')is-invalid @enderror"
                                        name="medicine_group_id">
                                        <option disabled hidden selected>Chọn</option>
                                        @foreach ($medicineGroups as $medicineGroup)
                                        <option disabled>{{ $medicineGroup->name }}
                                        </option>
                                        @foreach ($medicineGroup->children as $child)
                                        <option value="{{ $child->id }}"
                                            {{ old('medicine_group_id') ? 'selected' : '' }}>- {{ $child->name }}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('medicine_group_id') }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">{{ __('labels.supplier') }}</label>
                                    <select class="form-control @error('supplier_id')is-invalid @enderror"
                                        name="supplier_id">
                                        <option disabled hidden selected>Chọn</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id') ? 'selected' : '' }}>
                                            {{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('supplier_id') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="textarea-description">{{ __('labels.description') }}</label>
                                    <textarea class="form-control @error('description')is-invalid @enderror"
                                        name="description" id="textarea-description">{{ old('description') }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="input-unit">{{ __('labels.unit') }}</label>
                                    <input type="text" name="unit"
                                        class="form-control @error('unit')is-invalid @enderror" id="input-unit"
                                        placeholder="{{ __('labels.unit') }}" value="{{ old('unit') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('unit') }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input-quantity">{{ __('labels.quantity') }}</label>
                                    <input type="number" name="quantity" min="0"
                                        class="form-control @error('quantity')is-invalid @enderror" id="input-quantity"
                                        placeholder="{{ __('labels.quantity') }}" value="{{ old('quantity') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('quantity') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="input-price">{{ __('labels.price') }}</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price')is-invalid @enderror" id="input-price"
                                        placeholder="{{ __('labels.price') }}" value="{{ old('price') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('price') }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input-exp">{{ __('labels.exp') }}</label>
                                    <input type="text" name="exp" class="form-control @error('exp')is-invalid @enderror"
                                        id="input-exp" placeholder="{{ __('labels.exp') }}" value="{{ old('exp') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('exp') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Hình ảnh thuốc</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" accept="image/*" name="images[]"
                                    class="form-control-file @error('images')is-invalid @enderror @error('images.0')is-invalid @enderror"
                                    multiple>
                                <div class="invalid-feedback">
                                    @if ($errors->has('images'))
                                    {{ $errors->first('images') }}
                                    @else
                                    {{ $errors->first('images.0') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Chi tiết thuốc</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="textarea-ingredients">{{ __('labels.ingredients') }}</label>
                                    <textarea class="form-control @error('ingredients')is-invalid @enderror"
                                        name="ingredients" id="textarea-ingredients">
                                        {{ old('ingredients') }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ingredients') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="textarea-objects_used">{{ __('labels.objects_used') }}</label>
                                    <textarea class="form-control @error('objects_used')is-invalid @enderror"
                                        name="objects_used" id="textarea-objects_used">
                                    {{ old('objects_used') }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('objects_used') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="textarea-dosage_and_usage">{{ __('labels.dosage_and_usage') }}</label>
                                    <textarea class="form-control @error('dosage_and_usage')is-invalid @enderror"
                                        name="dosage_and_usage" id="textarea-dosage_and_usage">
                                        {{ old('dosage_and_usage') }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('dosage_and_usage') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="textarea-preservation">{{ __('labels.preservation') }}</label>
                                    <textarea class="form-control @error('preservation')is-invalid @enderror"
                                        name="preservation" id="textarea-preservation">
                                        {{ old('preservation') }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('preservation') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="textarea-careful">{{ __('labels.careful') }}</label>
                                    <textarea class="form-control @error('careful')is-invalid @enderror" name="careful"
                                        id="textarea-careful">
                                        {{ old('careful') }}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('careful') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer pt-3 border-top text-right">
                                <button type="submit" class="btn btn-primary btn-default">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admin/assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#sidebar-toggler').click()
    })

    $('#textarea-ingredients').summernote()
    $('#textarea-objects_used').summernote()
    $('#textarea-dosage_and_usage').summernote()
    $('#textarea-preservation').summernote()
    $('#textarea-careful').summernote()

    $('input[name="exp"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment().add(1, 'year'),
        locale: {
            format: 'DD/MM/YYYY'
        }
    })
</script>
@endsection
