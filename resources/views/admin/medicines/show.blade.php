@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="breadcrumb-wrapper">
                    <h1>{{ $medicine->name }} <small>#{{ $medicine->id }}</small></h1>

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
                                {{ $medicine->name }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-right">
                <a class="mr-2 mb-1 btn btn-pill btn-success" href="{{ route('admin.medicines.edit', $medicine->id) }}">
                    <i class="mdi mdi-update"></i>
                    Cập nhật
                </a>
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#images" role="tab"
                                    aria-controls="home" aria-selected="true">{{ __('labels.images') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#medicine" role="tab"
                                    aria-controls="home" aria-selected="true">Thông tin thuốc</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ingredients" role="tab"
                                    aria-controls="profile" aria-selected="false">{{ __('labels.ingredients') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#objects_used" role="tab"
                                    aria-controls="contact" aria-selected="false">{{ __('labels.objects_used') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dosage_and_usage"
                                    role="tab" aria-controls="contact"
                                    aria-selected="false">{{ __('labels.dosage_and_usage') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#preservation" role="tab"
                                    aria-controls="contact" aria-selected="false">{{ __('labels.preservation') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#careful" role="tab"
                                    aria-controls="contact" aria-selected="false">{{ __('labels.careful') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane pt-3 fade show active" id="images" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div class="prescription-images" style="width: 100%">
                                    @foreach ($medicine->images as $image)
                                    <a href="{{ asset($image->path) }}" data-fancybox="{{ $medicine->name }}"
                                        data-caption="{{ $medicine->name }}">
                                        <img src="{{ asset($image->path) }}" style="max-width: calc(100% / 6.1)" />
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane pt-3 fade" id="medicine" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('labels.name') }}</label>
                                            <div class="input-group">
                                                <p>{{ $medicine->name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('labels.medicine_group') }}</label>
                                            <div class="input-group">
                                                <p>{{ $medicine->medicineGroup->name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('labels.supplier') }}</label>
                                            <div class="input-group">
                                                <p>{{ $medicine->supplier->name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('labels.unit') }}</label>
                                            <div class="input-group">
                                                <p>{{ $medicine->unit }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('labels.quantity') }}</label>
                                            <div class="input-group">
                                                <p>{{ $medicine->quantity }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('labels.price') }}</label>
                                            <div class="input-group">
                                                <p>{{ number_format($medicine->price) }} <u>đ</u></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('labels.exp') }}</label>
                                            <div class="input-group">
                                                <p>{{ date('d/m/Y', strtotime($medicine->exp)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('labels.description') }}</label>
                                            <div class="input-group">
                                                <p>{{ $medicine->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane pt-3 fade" id="ingredients" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div>{!! $medicine->medicineDetail->ingredients !!}</div>
                            </div>
                            <div class="tab-pane pt-3 fade" id="objects_used" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div>{!! $medicine->medicineDetail->objects_used !!}</div>
                            </div>
                            <div class="tab-pane pt-3 fade" id="dosage_and_usage" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div>{!! $medicine->medicineDetail->dosage_and_usage !!}</div>
                            </div>
                            <div class="tab-pane pt-3 fade" id="preservation" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div>{!! $medicine->medicineDetail->preservation !!}</div>
                            </div>
                            <div class="tab-pane pt-3 fade" id="careful" role="tabpanel" aria-labelledby="contact-tab">
                                <div>{!! $medicine->medicineDetail->careful !!}</div>
                            </div>
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
                        Tất cả các thông tin, dữ liệu liên quan đến sản phẩm thuốc này cũng sẽ bị xóa.<br />
                        Vẫn muốn tiếp tục?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-pill"
                            data-dismiss="modal">{{ __('labels.close') }}</button>
                        <form method="POST" action="{{ route('admin.medicines.delete', $medicine->id) }}">
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

@section('js')
<script>
    $(document).ready(function() {
        $('#sidebar-toggler').click()
    })
</script>
@endsection