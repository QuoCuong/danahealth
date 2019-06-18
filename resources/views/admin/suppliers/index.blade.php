@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="breadcrumb-wrapper">
                    <h1>{{ __('labels.supplier') }}</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ __('labels.supplier') }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-right">
                <a class="mb-1 btn btn-pill btn-success" href="{{ route('admin.suppliers.create') }}">
                    <i class="mdi mdi-playlist-plus"></i>
                    Thêm nhà cung cấp
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">

                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('labels.name') }}</th>
                                    <th>{{ __('labels.email') }}</th>
                                    <th>{{ __('labels.address') }}</th>
                                    <th>{{ __('labels.phone') }}</th>
                                    <th>{{ __('labels.country') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                <tr class="c-pointer clickable"
                                    href="{{ route('admin.suppliers.edit', $supplier->id) }}">
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->country }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $suppliers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
