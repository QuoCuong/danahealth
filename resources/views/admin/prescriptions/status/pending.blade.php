@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/assets/css/prescription.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="breadcrumb-wrapper">
                    <h1>
                        Xem đơn thuốc
                        <small>#{{ $prescription->id }}</small>
                    </h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.prescriptions.index') }}">
                                    {{ __('labels.prescription') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Xem đơn thuốc
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-right">
                <button type="button" class="mb-1 btn btn-pill btn-danger action" href="#cancel-prescription-form">Hủy
                    đơn thuốc</button>
                <form id="cancel-prescription-form" method="POST"
                    action="{{ route('admin.prescriptions.cancel', $prescription->id) }}" style="display: none">@csrf
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-lg-5">
                <div class="card card-default">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab" data-toggle="tab"
                                    href="#info-prescription" role="tab" aria-controls="home" aria-selected="true">Thông
                                    tin đơn thuốc</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#info-customer" role="tab"
                                    aria-controls="profile" aria-selected="false">Thông tin khách hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#info-images" role="tab"
                                    aria-controls="contact" aria-selected="false">Hình ảnh</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane pt-3 fade active show" id="info-prescription" role="tabpanel"
                                aria-labelledby="home-tab">
                                <ul>
                                    <li>
                                        <span class="mdi mdi-account"></span>
                                        {{ $prescription->fullname }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-phone"></span>
                                        {{ $prescription->phone }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-email"></span>
                                        {{ $prescription->email }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-home"></span>
                                        {{ $prescription->address }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-account-location"></span>
                                        {{ $prescription->district->name }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-city"></span>
                                        Thành phố {{ $prescription->district->city->name }}
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane pt-3 fade" id="info-customer" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <ul>
                                    <li>
                                        <span class="mdi mdi-account"></span>
                                        {{ $prescription->user->last_name . ' ' . $prescription->user->first_name }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-phone"></span>
                                        {{ $prescription->user->phone }}
                                    </li>
                                    <li>
                                        <span class="mdi mdi-email"></span>
                                        {{ $prescription->user->email }}
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane pt-3 fade" id="info-images" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div class="prescription-images" style="width: 100%">
                                    @foreach ($prescription->images as $key => $image)
                                    <a href="{{ asset($image->path) }}" data-fancybox="prescription"
                                        data-caption="Hình {{ $key + 1 }}">
                                        <img src="{{ asset($image->path) }}" alt="" />
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom justify-content-between">
                        <h2>Xác nhận đơn thuốc</h2>
                        <button type="button" class="mb-1 btn btn-pill btn-success" id="add-medicine">
                            <i class="mdi mdi-playlist-plus"></i>
                            Thêm
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="wrapper-input">
                            <input class="form-control mb-3" id="add-medicine-input"
                                style="border-radius: 100px; display: none"
                                placeholder="Nhập tên thuốc hoặc nhà cung cấp">
                            <ul id="suggest-medicine" style="display: none"></ul>
                        </div>
                        <form action="{{ route('admin.orders.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="prescription_id" value="{{ $prescription->id }}">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('labels.medicine_name') }}</th>
                                        <th>{{ __('labels.unit') }}</th>
                                        <th>{{ __('labels.quantity') }}</th>
                                        <th class="text-right">{{ __('labels.unit_price') }}</th>
                                        <th class="text-right">Thành tiền</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <div id="total-confirm" class="row justify-content-end" style="display: none">
                                <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
                                    <ul class="list-unstyled mt-4">
                                        <li class="pb-3 text-dark">{{ __('labels.total') }}
                                            <span class="d-inline-block float-right total"></span>
                                        </li>
                                    </ul>
                                    <button id="confirm-button"
                                        class="btn btn-block mt-2 btn-lg btn-primary btn-pill">{{ __('labels.confirm') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admin/assets/js/prescription.js') }}"></script>
@endsection
