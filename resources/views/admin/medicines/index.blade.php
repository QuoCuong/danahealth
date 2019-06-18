@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="breadcrumb-wrapper">
                    <h1>{{ __('labels.medicine') }}</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ __('labels.medicine') }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-right">
                <a class="mb-1 btn btn-pill btn-success" href="{{ route('admin.medicines.create') }}">
                    <i class="mdi mdi-playlist-plus"></i>
                    Thêm thuốc
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="dropdown d-inline-block mb-1 ml-3">
                            @switch($isDescending)
                            @case(1)
                            <form action="">
                                <input type="hidden" name="isDescending" value="0">
                                <button class="mb-1 btn btn-pill btn-info">
                                    <i class=" mdi mdi-sort-descending mr-1"></i>
                                    {{ __('labels.sort') }}
                                </button>
                            </form>
                            @break
                            @case(0)
                            <form action="">
                                <input type="hidden" name="isDescending" value="1">
                                <button class="mb-1 btn btn-pill btn-info">
                                    <i class=" mdi mdi-sort-ascending mr-1"></i>
                                    {{ __('labels.sort') }}
                                </button>
                            </form>
                            @break
                            @default

                            @endswitch
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('labels.name') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.unit') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.quantity') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.price') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.exp') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicines as $medicine)
                                <tr class="c-pointer clickable"
                                    href="{{ route('admin.medicines.show', $medicine->id) }}">
                                    <td>{{ $medicine->id }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $medicine->unit }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $medicine->quantity }}</td>
                                    <td class="d-none d-lg-table-cell">{{ number_format($medicine->price) }} <u>đ</u>
                                    </td>
                                    <td class="d-none d-lg-table-cell">{{ date('d/m/Y', strtotime($medicine->exp)) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $medicines->appends([
                    'isDescending' => $isDescending,
                ])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
