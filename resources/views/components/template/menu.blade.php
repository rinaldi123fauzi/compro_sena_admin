<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ url('') }}/dashboard" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                                height="22">
                        </span>
                        <span class="logo-lg">
                            {{-- <img src="{{ URL::asset('') }}assets/images/logo-dark.png" alt="" height="17"> --}}
                            <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                                height="17">
                        </span>
                    </a>

                    <a href="{{ url('') }}/dashboard" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                                height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                                height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            {{-- <img class="rounded-circle header-profile-user"
                                src="{{ URL::asset('') }}assets/images/users/avatar-1.jpg" alt="Header Avatar"> --}}
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">
                                    @auth
                                        {{ Auth::User()->name }}
                                    @endauth
                                </span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"
                                    style="text-transform: capitalize">
                                    @auth
                                        {{ Auth::User()->role }}
                                    @endauth
                                </span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome @auth
                                {{ Auth::User()->name }}
                            @endauth!</h6>


                        <a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ url('') }}/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('') }}assets/images/logosena.png" alt="" height="60px">
                {{-- <img src="{{ URL::asset('') }}assets/images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('') }}assets/images/logosena.png" alt="" height="60px"">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('') }}/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('') }}assets/images/logosena.png" alt="" height="60px">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('') }}assets/images/logosena.png" alt="" height="60px">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('') }}/dashboard">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>

                </li> <!-- end Dashboard Menu -->

                {{-- <a class="nav-link menu-link collapsed active" href="#sidebarAdvanceUI" data-bs-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="sidebarAdvanceUI">
                    <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Advance UI</span>
                </a> --}}




                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('home.*') ? 'colapsed' : '' }} {{ Request::routeIs('home.*') ? 'active' : '' }}"
                        href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarApps">
                        <i class="ri-home-3-line"></i> <span data-key="t-apps">Home</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('home.*') ? 'show' : '' }}"
                        id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">


                                <a href="{{ route('home-slider.edit') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Slider
                                </a>

                            </li>

                            <li class="nav-item">
                                <a href="{{ route('home.about') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    About Business
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarcapabilitieshome" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarcapabilitieshome"
                                    data-key="t-email">
                                    Capabilities
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarcapabilitieshome">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('home.editcapabilitiestitle') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Title </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('home.capability_add') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Add </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('home.capability_list') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                List </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarcounterhome" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarcounterhome"
                                    data-key="t-email">
                                    Counter
                                </a>
                                <div class="collapse menu-dropdown {{ Request::routeIs('home.counter_add') ? 'show' : '' }} {{ Request::routeIs('home.counter_list') ? 'show' : '' }} {{ Request::routeIs('home.editcountertitle') ? 'show' : '' }}"
                                    id="sidebarcounterhome">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('home.editcountertitle') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Title </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('home.counter_list') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                List </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('instagram.*') ? 'colapsed' : '' }} {{ Request::routeIs('instagram.*') ? 'active' : '' }}"
                        href="#sidebarinstagram" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarinstagram">
                        <i class="ri-instagram-line"></i> <span data-key="t-apps">Instagram</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('instagram.*') ? 'show' : '' }}"
                        id="sidebarinstagram">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('instagram.add') }}"
                                    class="nav-link {{ Request::routeIs('instagram.add') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Add Instagram
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('instagram.index') }}"
                                    class="nav-link {{ Request::routeIs('instagram.index') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    List Instagram
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('about.*') ? 'colapsed' : '' }} {{ Request::routeIs('about.*') ? 'active' : '' }}"
                        href="#sidebarabout" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarabout">
                        <i class="ri-pages-line"></i> <span data-key="t-apps">About Us</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('about.*') ? 'show' : '' }} "
                        id="sidebarabout">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('about.about') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Company Overview
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('about.aboutus_image_slider_add') }}" class="nav-link"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Slider
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('about.visimisi') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Vision & Mission
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('about.akhlak') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Akhlak
                                </a>
                            </li> --}}

                            <li class="nav-item">
                                <a href="#sideakhlak" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sideakhlak" data-key="t-email">
                                    Akhlak
                                </a>
                                <div class="collapse menu-dropdown" id="sideakhlak">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('about.editakhlaktitle') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Title </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('about.akhlakeditbackground') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Background </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="{{ route('about.akhlak') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Akhlak </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>



                            <li class="nav-item">
                                <a href="#sidebarexecutiveleadership" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarexecutiveleadership"
                                    data-key="t-email">
                                    Executive Leadership
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarexecutiveleadership">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('about.editexecutiveleadershiptitle') }}"
                                                class="nav-link" data-key="t-mailbox">
                                                Title </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('about.direksidankomisaris') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Executive Leadership </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a href="#sidebarpiagam" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarpiagam" data-key="t-email">
                                    Certifications & Awards
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarpiagam">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('about.piagamtitle') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Title </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('about.piagam') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Add </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarkomitmendankebijakan" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarkomitmendankebijakan"
                                    data-key="t-email">
                                    Commitments & Policies
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarkomitmendankebijakan">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('about.komitmendankebijakan') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Add </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('about.editkomitmendankebijakantitle') }}"
                                                class="nav-link" data-key="t-mailbox">
                                                Title </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('about.strukturorganisasi') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Organizational Structure
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('about.kepemilikansaham') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Share Ownership
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('about.piagam') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Piagam Penghargaan
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>




                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('service.*') ? 'colapsed' : '' }} {{ Request::routeIs('service.*') ? 'active' : '' }}"
                        href="#sidebarcapabilities" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarcapabilities">
                        <i class="ri-stack-line"></i> <span data-key="t-apps">Capability</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('service.*') ? 'show' : '' }} "
                        id="sidebarcapabilities">
                        <ul class="nav nav-sm flex-column">




                            <li class="nav-item">
                                <a href="#sidebarservice" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarservice" data-key="t-email">
                                    Service
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarservice">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('service.add') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Add </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('service.index') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                List </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('service.discipline_add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Discipline
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('service.softwaredanhardware') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Software & Hardware
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link menu-link {{ (Request::routeIs('capability.*') && !Request::routeIs('capability.editsoftwaretitle') && !Request::routeIs('capability.edittoolstitle')) || Request::routeIs('layanan.*') ? 'colapsed' : '' }} {{ (Request::routeIs('capability.*') && !Request::routeIs('capability.editsoftwaretitle') && !Request::routeIs('capability.edittoolstitle')) || Request::routeIs('layanan.*') ? 'active' : '' }}"
                        href="#sidebarcapability" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarcapability">
                        <i class="ri-settings-3-line"></i> <span data-key="t-apps">Capability</span>
                    </a>
                    <div class="collapse menu-dropdown {{ (Request::routeIs('capability.*') && !Request::routeIs('capability.editsoftwaretitle') && !Request::routeIs('capability.edittoolstitle')) || Request::routeIs('layanan.*') ? 'show' : '' }}"
                        id="sidebarcapability">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('capability.add') }}"
                                    class="nav-link {{ Request::routeIs('capability.add') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Add Capability
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('capability.index') }}"
                                    class="nav-link {{ Request::routeIs('capability.index') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    List Capability
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('disiplin.*') ? 'colapsed' : '' }} {{ Request::routeIs('disiplin.*') ? 'active' : '' }}"
                        href="#sidebardisiplin" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebardisiplin">
                        <i class="ri-shield-check-line"></i> <span data-key="t-apps">Disciplines</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('disiplin.*') ? 'show' : '' }}"
                        id="sidebardisiplin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('disiplin.add') }}"
                                    class="nav-link {{ Request::routeIs('disiplin.add') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Add Disiplin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('disiplin.index') }}"
                                    class="nav-link {{ Request::routeIs('disiplin.index') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    List Disiplin
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('software_hardware.*', 'capability.editsoftwaretitle', 'capability.edittoolstitle') ? 'colapsed' : '' }} {{ Request::routeIs('software_hardware.*', 'capability.editsoftwaretitle', 'capability.edittoolstitle') ? 'active' : '' }}"
                        href="#sidebarsoftwarehardware" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarsoftwarehardware">
                        <i class="ri-computer-line"></i> <span data-key="t-apps">Software & Equipment</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('software_hardware.*', 'capability.editsoftwaretitle', 'capability.edittoolstitle') ? 'show' : '' }}"
                        id="sidebarsoftwarehardware">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('software_hardware.create') }}"
                                    class="nav-link {{ Request::routeIs('software_hardware.create') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Add Software & Equipment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('software_hardware.index') }}"
                                    class="nav-link {{ Request::routeIs('software_hardware.index') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    List Software & Equipment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('capability.editsoftwaretitle') }}"
                                    class="nav-link {{ Request::routeIs('capability.editsoftwaretitle') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Software Title
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('capability.edittoolstitle') }}"
                                    class="nav-link {{ Request::routeIs('capability.edittoolstitle') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Tools Title
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('project.*') || Request::routeIs('highlight-project.*') ? 'colapsed' : '' }} {{ Request::routeIs('project.*') || Request::routeIs('highlight-project.*') ? 'active' : '' }}"
                        href="#sidebarproject" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarproject">
                        <i class="ri-briefcase-line"></i> <span data-key="t-apps">Project</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('project.*') || Request::routeIs('highlight-project.*') ? 'show' : '' }}"
                        id="sidebarproject">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('project.add') }}"
                                    class="nav-link {{ Request::routeIs('project.add') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Add Project
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('project.index') }}"
                                    class="nav-link {{ Request::routeIs('project.index') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    List Project
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('highlight-project.add') }}"
                                    class="nav-link {{ Request::routeIs('highlight-project.add') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    Add Highlight Project
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('highlight-project.index') }}"
                                    class="nav-link {{ Request::routeIs('highlight-project.index') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarEmail"
                                    data-key="t-email">
                                    List Highlight Project
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>





                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('contact-us.*') || Request::routeIs('contactus.*') ? 'colapsed' : '' }} {{ Request::routeIs('contact-us.*') || Request::routeIs('contactus.*') ? 'active' : '' }}"
                        href="#sidebarcontactus" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarcontactus" aria-expanded="true">
                        <i class="ri-contacts-line"></i>
                        <span data-key="t-apps">Contact Us</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('contact-us.*') || Request::routeIs('contactus.*') ? 'show' : '' }}"
                        id="sidebarcontactus">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('contact-us.edit') }}"
                                    class="nav-link {{ Request::routeIs('contact-us.edit') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarcontactus"
                                    data-key="t-email">
                                    Edit Contact Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contactus.edittitle') }}"
                                    class="nav-link {{ Request::routeIs('contactus.edittitle') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarcontactus"
                                    data-key="t-email">
                                    Edit Title
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact-us.listpertanyaan') }}"
                                    class="nav-link {{ Request::routeIs('contact-us.listpertanyaan') ? 'active' : '' }}"
                                    role="button" aria-expanded="false" aria-controls="sidebarcontactus"
                                    data-key="t-email">
                                    List Pertanyaan
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('news*') ? 'colapsed' : '' }} {{ Request::routeIs('news*') ? 'active' : '' }}"
                        href="#sidebarnews" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarnews" aria-expanded="true">
                        <i class="ri-article-line"></i>
                        <span data-key="t-apps">News & Articles</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('news*') ? 'show' : '' }}"
                        id="sidebarnews">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('news.add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarnews" data-key="t-email">
                                    Add
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('news.index') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarnews" data-key="t-email">
                                    List
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('user.*') ? 'colapsed' : '' }} {{ Request::routeIs('user.*') ? 'active' : '' }}"
                        href="#sidebarannualreport" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarannualreport" aria-expanded="true">
                        <i class="ri-file-line"></i>
                        <span data-key="t-apps">Annual Report</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('user.*') ? 'show' : '' }}"
                        id="sidebarannualreport">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('annualreport.add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarannualreport" data-key="t-email">
                                    Add
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('annualreport.index') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarannualreport" data-key="t-email">
                                    List
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('annualreport.pertanyaan') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarannualreport" data-key="t-email">
                                    Permintaan Annual Report
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>




                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('experience.*') ? 'colapsed' : '' }} {{ Request::routeIs('experience.*') ? 'active' : '' }}"
                        href="#sideexperience" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sideexperience" aria-expanded="true">
                        <i class="ri-trophy-line"></i>
                        <span data-key="t-apps">Experience</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('experience.*') ? 'show' : '' }}"
                        id="sideexperience">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('experience.section1') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sideexperience" data-key="t-email">
                                    Section Map
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('experience.section2') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sideexperience" data-key="t-email">
                                    Section Kategori
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('experience.section3') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sideexperience" data-key="t-email">
                                    Section Client
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}









                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Widget</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('home.client_add') ? 'colapsed' : '' }} {{ Request::routeIs('home.client_add') ? 'active' : '' }}"
                        href="#sidebarclient" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarclient">
                        <i class="ri-service-line"></i>
                        <span data-key="t-apps">Client</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('home.client_add') ? 'show' : '' }} {{ Request::routeIs('home.client_list') ? 'show' : '' }} {{ Request::routeIs('home.editclienttitle') ? 'show' : '' }}"
                        id="sidebarclient">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('home.editclienttitle') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Title
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.client_add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Add
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.client_list') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    List
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">General</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('header.*') ? 'colapsed' : '' }} {{ Request::routeIs('header.*') ? 'active' : '' }}"
                        href="#header" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="header">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-apps">Header</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('header.*') ? 'show' : '' }} "
                        id="header">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('header.logo') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Logo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.about_us') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    About Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.news') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    News
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.investor') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Investor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.capability') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Capability
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.experience') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Experience
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.contact_us') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Contact Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('header.annualreport') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Annual Report
                                </a>
                            </li>



                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::routeIs('footer.*') ? 'active' : '' }}"
                        href="{{ route('footer.edit') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-layout-3-line"></i> <span data-key="t-dashboards">Footer</span>
                    </a>

                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('user.*') ? 'colapsed' : '' }} {{ Request::routeIs('user.*') ? 'active' : '' }}"
                        href="#sidebaruser" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebaruser" aria-expanded="true">
                        <i class="ri-group-line"></i>
                        <span data-key="t-apps">Users</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('user.*') ? 'show' : '' }}"
                        id="sidebaruser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('user.add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebaruser" data-key="t-email">
                                    Add
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebaruser" data-key="t-email">
                                    List
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('log') }}/">
                        <i class="ri-file-list-line"></i> <span data-key="t-dashboards">Logging</span>
                    </a>

                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
