@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="breadcrumb-wrapper">
                    <h1>Thêm nhà cung cấp</h1>

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
                                Thêm nhà cung cấp
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="col-xs-12 col-md-6">
                            <form method="POST" action="{{ route('admin.suppliers.store') }}" autocomplete="off">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="input-name">{{ __('labels.name') }}</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')is-invalid @enderror" id="input-name"
                                            placeholder="{{ __('labels.name') }}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-email">{{ __('labels.email') }}</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email')is-invalid @enderror" id="input-email"
                                            placeholder="{{ __('labels.email') }}" value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-address">{{ __('labels.address') }}</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address')is-invalid @enderror"
                                            id="input-address" placeholder="{{ __('labels.address') }}" value="{{ old('address') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-phone">{{ __('labels.phone') }}</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone')is-invalid @enderror" id="input-phone"
                                            placeholder="{{ __('labels.phone') }}" value="{{ old('phone') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="input-country">{{ __('labels.country') }}</label>
                                        <input type="text" name="country"
                                            class="form-control @error('country')is-invalid @enderror"
                                            id="input-country" placeholder="{{ __('labels.country') }}" value="{{ old('country') }}"
                                            required="">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
