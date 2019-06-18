@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>{{ __('labels.prescription') }}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ __('labels.prescription') }}
                    </li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none">
                    <div class="card-header">
                        <div class="dropdown d-inline-block mb-1">
                            @switch($status)
                            @case('pending')
                            <button class="btn btn-pill btn-warning dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                data-display="static">
                                {{ __('labels.status') }}
                            </button>
                            @break
                            @case('approved')
                            <button class="btn btn-pill btn-primary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                data-display="static">
                                {{ __('labels.status') }}
                            </button>
                            @break
                            @case('cancelled')
                            <button class="btn btn-pill btn-danger dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                data-display="static">
                                {{ __('labels.status') }}
                            </button>
                            @break
                            @default

                            @endswitch
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?status=pending">{{ __('labels.pending') }}</a>
                                <a class="dropdown-item" href="?status=approved">{{ __('labels.approved') }}</a>
                                <a class="dropdown-item" href="?status=cancelled">{{ __('labels.cancelled') }}</a>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block mb-1 ml-3">
                            @switch($isDescending)
                            @case(1)
                            <form action="">
                                <input type="hidden" name="status" value="{{ $status }}">
                                <input type="hidden" name="isDescending" value="0">
                                <button class="mb-1 btn btn-pill btn-info">
                                    <i class=" mdi mdi-sort-descending mr-1"></i>
                                    {{ __('labels.sort') }}
                                </button>
                            </form>
                            @break
                            @case(0)
                            <form action="">
                                <input type="hidden" name="status" value="{{ $status }}">
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
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('labels.date') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.fullname') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.phone') }}</th>
                                    <th class="d-none d-lg-table-cell">{{ __('labels.address') }}</th>
                                    <th>{{ __('labels.status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prescriptions as $prescription)
                                <tr class="c-pointer clickable"
                                    href="{{ route('admin.prescriptions.show', $prescription->id) }}">
                                    <td>{{ $prescription->id }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($prescription->date)) }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $prescription->fullname }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $prescription->phone }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $prescription->address }}</td>
                                    <td>
                                        @switch($prescription->status)
                                        @case('pending')
                                        <span
                                            class="badge badge-pill badge-warning">{{ __('labels.' . $prescription->status) }}</span>
                                        @break
                                        @case('approved')
                                        <span
                                            class="badge badge-pill badge-primary">{{ __('labels.' . $prescription->status) }}</span>
                                        @break
                                        @case('cancelled')
                                        <span
                                            class="badge badge-pill badge-danger">{{ __('labels.' . $prescription->status) }}</span>
                                        @break
                                        @default

                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $prescriptions->appends([
                    'status'       => $status,
                    'isDescending' => $isDescending,
                ])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
