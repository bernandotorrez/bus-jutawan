<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('home.index') }}" class="nav-link"> Bus Jutawan</a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">
            <li class="menu single-menu {{ (request()->is('home')) ? 'active' : '' }}">
                <a href="{{ route('home.index') }}">
                    <div class="">
                        <i style="color: white;" class="fas fa-home {{ (request()->is('home')) ? 'icon-active' : '' }}"></i> &nbsp;
                        <span>Home</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
