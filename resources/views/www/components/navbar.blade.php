<header class='mb-3'>
    <nav class="navbar navbar-expand">
        <div class="container-fluid">

        {{-- An den ise logged in men diksis to menu button--}}
        @auth('user3')
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endauth

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-0 mb-lg-0">

                    {{--If we are at the reservation page, the "make a reservation" button should not exist--}}
                    @unless( request()->route()->uri === "make-a-reservation")

                    <div class="user-menu align-items-center">
                        <div class="user-name text-center me-3">
                            <h6 class="mb-0 text-gray-600 text-nowrap">
                                <a href="/make-a-reservation">Make a reservation</a>
                            </h6>
                        </div>
                    </div>

                    @endif

                    {{-- an eisai guest dikse log in or signup sto navbar--}}
                    @guest
                    <div class="user-menu">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600 text-nowrap">
                                <a id="btnLogin" href="/login">Log in</a>
                            </h6>
                        </div>
                    </div>

                    <div class="user-menu">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600 text-nowrap">
                                <a href="/signup">Sign Up</a>
                            </h6>
                        </div>
                    </div>
                    @endguest

                </ul>

                {{-- An ise user3 logged in dikse to onoma su me dropdownlist sto navbar --}}
                @auth('user3')
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            {{-- Na ginete check gia ton sigkekrimeno user--}}
                            <div class="user-name text-end me-3">
                                {{--Dame en dulefki epd prp nan signe upd--}}
                                {{--Na fkallei log in or sign up an den en signed up allo page?--}}
                                <h6 class="mb-0 text-blue">{{Auth::guard('user3')->user()->username}}</h6>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hello, {{Auth::guard('user3')->user()->full_name}}!</h6>
                        </li>
                        <li><a class="dropdown-item" href="/profile"><i
                                    class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <li><a class="dropdown-item" href="/my-reservations"><i
                                    class="icon-mid bi bi-wallet me-2"></i>
                                My Reservations</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </ul>
                </div>
                @endauth


            </div>
        </div>
    </nav>
</header>
