@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="breadcrumb-wrapper">
                    <h1>{{ $supplier->name }}</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.suppliers.index') }}">
                                    {{ __('labels.supplier') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ $supplier->name }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-right">
                <button class="mb-1 btn btn-pill btn-danger" data-toggle="modal" data-target="#delete-confirm">
                    <i class="mdi mdi-playlist-remove"></i>
                    Xóa
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="col-xs-12 col-md-6">
                            <form method="POST" action="{{ route('admin.suppliers.update', $supplier->id) }}"
                                autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="input-name">{{ __('labels.name') }}</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')is-invalid @enderror" id="input-name"
                                            placeholder="{{ __('labels.name') }}" value="{{ $supplier->name }}"
                                            required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-email">{{ __('labels.email') }}</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email')is-invalid @enderror" id="input-email"
                                            placeholder="{{ __('labels.email') }}"
                                            value="{{ $supplier->email ?? old('email') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-address">{{ __('labels.address') }}</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address')is-invalid @enderror"
                                            id="input-address" placeholder="{{ __('labels.address') }}"
                                            value="{{ $supplier->address ?? old('address') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-phone">{{ __('labels.phone') }}</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone')is-invalid @enderror" id="input-phone"
                                            placeholder="{{ __('labels.phone') }}"
                                            value="{{ $supplier->phone ?? old('phone') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-country">{{ __('labels.country') }}</label>
                                        <input type="text" name="country"
                                            class="form-control @error('country')is-invalid @enderror"
                                            id="input-country" placeholder="{{ __('labels.country') }}"
                                            value="{{ $supplier->country }}" required="">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tất cả các thông tin, dữ liệu liên quan đến nhà sản xuất này cũng sẽ bị xóa.<br />
                        Vẫn muốn tiếp tục?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-pill"
                            data-dismiss="modal">{{ __('labels.close') }}</button>
                        <form method="POST" action="{{ route('admin.suppliers.delete', $supplier->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary btn-pill">{{ __('labels.continue') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
