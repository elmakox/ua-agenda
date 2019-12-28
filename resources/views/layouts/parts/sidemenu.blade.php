<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div class="navbar-brand-box">
            <a href="{{ route('dashboard') }}" class="logo">
                <i class="mdi mdi-alpha-x-circle"></i>
                <span>UA Agenda 2063</span>
            </a>
        </div>

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                {{--<li class="menu-title">Menu</li>--}}
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect"><i class="feather-airplay"></i><span>Dashboard</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="feather-copy"></i><span>Pages</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('pages.index') }}">All pages</a></li>
                        <li><a href="{{ route('pages.create') }}">New page</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="feather-briefcase"></i><span>Projects</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('projects.index') }}">All projects</a></li>
                        <li><a href="{{ route('projects.create') }}">New project</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="feather-award"></i><span>Aspirations</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('aspirations.index') }}">All aspirations</a></li>
                        <li><a href="{{ route('aspirations.create') }}">New aspiration</a></li>
                    </ul>
                </li>

                <li><a href="calendar.html" class=" waves-effect"><i class="feather-calendar"></i><span>Calendar</span></a></li>

                <li class="menu-title">Administration</li>

                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect"><i class="feather-user"></i><span>Users</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>