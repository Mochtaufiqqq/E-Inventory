<div class="sidebar-wrapper h-100">
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#">
                        <img class="img-fluid" src="#" alt="">
                    </a>
                    <div class="mobile-back text-right">
                        <span>Back</span>
                        <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="sidebar-main-title pt-0">
                    <div>
                        <h6 class="text text-secondary">E-INVENTORY</h6>
                        <h6>SMKS MAHAPUTRA</h6>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/dashboard')}}">
                        <i data-feather="home"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="sidebar-main-title">
                    <div>
                        <h6>Manage</h6>
                        <p>Item, Loans, Warehouse & User</p>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/goods')}}">
                        <i data-feather="box"></i>
                        <span>Assets</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                        <i data-feather="book"></i>
                        <span>Loans</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="active">
                            <a href="{{url('/loanactivity')}}">
                                Loans Activity
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/loanrequests')}}">
                                Loans Request
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/user')}}">
                        <i data-feather="user"></i>
                        <span>Manage Users</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/warehouse')}}">
                        <i data-feather="package"></i>
                        <span>Warehouse</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="/logout">
                        <i data-feather="log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>

        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>