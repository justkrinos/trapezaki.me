<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="/"><img src="../assets/images/logo/logo.png" alt="Trapezaki" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            @include("business.components.login-info")
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title" style="font-weight: bold;  text-decoration: underline;">MENU</li>

                <li
                    class="sidebar-item

                        @if (request()->route()->uri === 'profile') active @endif

                        ">
                    <a href="/profile" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li
                    class="sidebar-item

                        @if (request()->route()->uri === 'manage-reservations') active @endif

                        ">
                    <a href="/manage-reservations" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Manage Reservations</span>
                    </a>
                </li>
                <li
                    class="sidebar-item

                        @if (request()->route()->uri === 'report-problem') active @endif

                        ">
                    <a href="/report-problem" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Report a Problem</span>
                    </a>
                </li>

                <li class="sidebar-item" hidden>
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
