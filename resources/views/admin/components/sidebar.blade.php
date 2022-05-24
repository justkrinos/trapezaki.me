<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="/"><img src="/assets/images/logo/logo.png" alt="Trapezaki" srcset=""></a>
                </div>


                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            @include('admin.components.login-info')
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title" style="font-weight: bold;  text-decoration: underline;">MENU</li>

                <li
                    class="sidebar-item
                @if (request()->route()->uri === 'manage-customers') active @endif
                ">
                    <a href="/manage-customers" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Manage Customers</span>
                    </a>
                </li>
                <li
                    class="sidebar-item
                @if (request()->route()->uri === 'pending-requests') active @endif
                ">

                    <a href="/pending-requests" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Pending Requests</span>
                    </a>
                </li>
                <li
                    class="sidebar-item
                @if (request()->route()->uri === 'issues') active @endif
                ">
                    <a href="/issues" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Issues</span>
                    </a>
                </li>

                 <li class="sidebar-item">
                    <a href="/tutorial" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Tutorial</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
