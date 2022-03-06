<header class='mb-3'>
    <nav class="navbar navbar-expand">
        <div class="container-fluid">
           
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-0 mb-lg-0">

                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <?php//testing guest and auth ?>
                            @guest
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-blue">Hello guest</h6>
                            </div>
                            @endguest
                            @auth
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-blue">{{auth()->user()->username}}</h6>
                            </div>
                            @else
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-blue">@myusername</h6>
                            </div>
                            @endauth
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hello, &lt;Name&gt;!</h6>
                        </li>
                        
                        <li><a class="dropdown-item" href="/logout"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
    {{--Toast dependencies--}}
    <script src="assets/vendors/toastify/toastify.js"></script>
    <script src="assets/js/extensions/toastify.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    @include("components.toasts")