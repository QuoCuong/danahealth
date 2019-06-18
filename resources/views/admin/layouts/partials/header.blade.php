<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block">
            <div class="input-group">
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <input type="text" name="query" id="search-input" class="form-control"
                    placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
                <ul id="search-results"></ul>
            </div>
        </div>
        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="d-none d-lg-inline-block">{{ Auth::guard('admin')->user()->fullname }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="action" href="#form-logout"> <i class="mdi mdi-logout"></i>{{ __('labels.logout') }}</a>
                            <form id="form-logout" method="POST" action="{{ route('admin.logout') }}" style="display: none">@csrf</form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
