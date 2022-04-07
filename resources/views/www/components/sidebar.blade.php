@auth('user3')
<div id="sidebar" class="">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="/"><img src="../assets/images/logo/logo.png" alt="Trapezaki"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title" style="font-weight: bold;  text-decoration: underline;">MENU</li>

                <li class="sidebar-item
                @if( request()->route()->uri === "profile")
                active
                @endif
                ">
                    <a href="/profile" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="sidebar-item
                @if( request()->route()->uri === "my-reservations")
                active
                @endif
                ">
                    <a href="/my-reservations" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>My Reservations</span>
                    </a>
                </li>
                <li class="sidebar-item
                @if( request()->route()->uri === "make-a-reservation")
                active
                @endif
                ">
                    <a href="/make-a-reservation" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Make a Reservation</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
@endauth
