<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('admin.dashboard') }}">
                {{-- <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg> --}}
                <img src="{{ asset('images/favicon.png') }}" alt="" style="width: 25px">
                <span class="brand-name">DanaHealth Dashboard</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">{{ __('labels.dashboard') }}</span>
                    </a>
                </li>
                @switch(Auth::guard('admin')->user()->role)
                    @case('admin')
                        <li>
                            <a class="sidenav-item-link" href="#">
                                <i class="mdi mdi-account-group-outline"></i>
                                <span class="nav-text">Nhân viên</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.medicine_groups.index') }}">
                                <i class="mdi mdi-format-list-bulleted-type"></i>
                                <span class="nav-text">Nhóm thuốc</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.medicines.index') }}">
                                <i class="mdi mdi-pill"></i>
                                <span class="nav-text">Thuốc</span>
                            </a>
                        </li>
                        @break
                    @case('sales')
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.prescriptions.index') }}">
                                <i class="mdi mdi-prescription"></i>
                                <span class="nav-text">Đơn thuốc</span>
                            </a>
                        </li>
                        @break
                    @case('warehouse')
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.suppliers.index') }}">
                                <i class="mdi mdi-docker"></i>
                                <span class="nav-text">Nhà cung cấp</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="#">
                                <i class="mdi mdi-truck-delivery"></i>
                                <span class="nav-text">Nhập thuốc</span>
                            </a>
                        </li>
                        @break
                    @case('shipper')
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.prescriptions.index') }}">
                                <i class="mdi mdi-truck-fast"></i>
                                <span class="nav-text">Giao hàng</span>
                            </a>
                        </li>
                        @break
                    @default
                @endswitch
            </ul>
        </div>
    </div>
</aside>
