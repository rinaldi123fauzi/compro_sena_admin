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
                <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                    width="200px">
                {{-- <img src="{{ URL::asset('') }}assets/images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                    width="200px">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('') }}/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                    width="200px">
            </span>
            <span class="logo-lg">
                <img src="https://linierdemo.my.id/assets/image/logosenaroundedsebelah.png" alt=""
                    width="200px">
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
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Slider
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('home.slider_add') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Add </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('home.slider_list') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                List </a>
                                        </li>
                                    </ul>
                                </div>
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
                                    About Business
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.visimisi') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Visi & Misi
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
                                        <li class="nav-item">
                                            <a href="{{ route('about.akhlakeditbackground') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Background </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('about.akhlak') }}" class="nav-link"
                                                data-key="t-mailbox">
                                                Akhlak </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>



                            <li class="nav-item">
                                <a href="{{ route('about.direksidankomisaris') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Direksi dan Komisaris
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="#sidebarpiagam" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarpiagam" data-key="t-email">
                                    Piagam Penghargaan
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
                            {{-- <li class="nav-item">
                                <a href="{{ route('about.piagam') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Piagam Penghargaan
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>




                <li class="nav-item">
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
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('project.*') ? 'colapsed' : '' }} {{ Request::routeIs('project.*') ? 'active' : '' }}"
                        href="#sidebarproject" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarproject">
                        <i class="ri-briefcase-line"></i> <span data-key="t-apps">Project</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('project.*') ? 'show' : '' }}"
                        id="sidebarproject">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('project.add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Add
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('project.index') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    List
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>





                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('contact-us.*') ? 'colapsed' : '' }} {{ Request::routeIs('contact-us.*') ? 'active' : '' }}"
                        href="#sidebarcontactus" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarcontactus" aria-expanded="true">
                        <i class="ri-contacts-line"></i>
                        <span data-key="t-apps">Contact Us</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('contact-us.*') ? 'show' : '' }}"
                        id="sidebarcontactus">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('contact-us.edit') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarcontactus" data-key="t-email">
                                    Edit
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact-us.listpertanyaan') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarcontactus" data-key="t-email">
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




                <li class="nav-item">
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
                </li>









                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Widget</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('home.counter_add') ? 'colapsed' : '' }} {{ Request::routeIs('home.counter_add') ? 'active' : '' }}"
                        href="#sidebarcounter" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarcounter">
                        <i class="ri-history-line"></i>
                        <span data-key="t-apps">Counter</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('home.counter_add') ? 'show' : '' }} {{ Request::routeIs('home.counter_list') ? 'show' : '' }}"
                        id="sidebarcounter">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a href="{{ route('home.counter_add') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Add
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('home.counter_list') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    List
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('home.client_add') ? 'colapsed' : '' }} {{ Request::routeIs('home.client_add') ? 'active' : '' }}"
                        href="#sidebarclient" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarclient">
                        <i class="ri-service-line"></i>
                        <span data-key="t-apps">Client</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::routeIs('home.client_add') ? 'show' : '' }} {{ Request::routeIs('home.client_list') ? 'show' : '' }}"
                        id="sidebarclient">
                        <ul class="nav nav-sm flex-column">
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
