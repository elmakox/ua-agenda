<header id="page-topbar">
    <div class="navbar-header">

        <div class="d-flex align-items-left">
            <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-plus"></i> Create New
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu">
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        Page
                    </a>
                    <a href="{{ route('projects.create') }}" class="dropdown-item notify-item">
                        Project
                    </a>
                    <a href="{{ route('aspirations.create') }}" class="dropdown-item notify-item">
                        Aspiration
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        Progress
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        News
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        Event
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        Media
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        Highlight
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center">

            <div class="dropdown d-none d-sm-inline-block ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar.png') }}"
                         alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Settings
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span>Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>