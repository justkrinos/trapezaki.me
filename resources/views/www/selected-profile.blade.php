<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - &lt;Cafe Name&gt;</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

</head>

<body>
    <div id="app">
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
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="/profile" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="/my-reservations" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>My Reservations</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
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

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-0 mb-lg-0">
                                <div class="user-menu align-items-center">
                                    <div class="user-name text-center me-3">
                                        <h6 class="mb-0 text-gray-600 text-nowrap">
                                            <a href="/make-a-reservation">Make a reservation</a>
                                        </h6>
                                    </div>
                                </div>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-blue">@myusername</h6>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, &lt;Name&gt;!</h6>
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
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="../assets/images/faces/1.jpg" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h2 class="font-bold text-nowrap">CAFE John Duck</h2>
                                </div>
                                <div class="container">
                                    <button class="btn btn-light-primary text-nowrap" type="button" id="btnBack"
                                        style="float: right;">
                                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                                            <use
                                                xlink:href="../assets/vendors/bootstrap-icons/bootstrap-icons.svg#arrow-left-circle-fill">
                                            </use>
                                        </svg>
                                        Back</button>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Description</h4>
                                    </div>
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi?
                                        Ullam quaerat
                                        similique iusto
                                        temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic
                                        deleniti? Placeat
                                        delectus
                                        quibusdam ratione ullam!
                                    </div>
                                </div>


                                <div class="card">
                                    <div clas="card-body">
                                        <div class="col-sm-12 d-flex justify-content-center">
                                            <form></form>
                                            <button class="btn btn-primary" id="btnBook" style="margin:5px;"> Book
                                                Now</button>
                                            <button class="btn btn-primary" style="margin:5px;"
                                                id="resvMenu">Menu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Photos</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="../assets/images/samples/banana.jpg"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="../assets/images/samples/bg-mountain.jpg"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Location</h4>
                                    </div>
                                    <div class="card-body">
                                        <iframe
                                            src="https://maps.google.com/maps?q=CUT%20cyprus&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                            frameborder="0" style="border:0; width: 100%; height: 290px;"
                                            allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>

        <!--login form Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center" id="myModalLabel33">Please
                            Log in to continue.</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Have an Account</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Continue as
                                    Guest</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form action="#">
                                    <div class="modal-body">
                                        <label>Username: </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="Username or Email" class="form-control">
                                        </div>
                                        <label>Password: </label>
                                        <div class="form-group">
                                            <input type="password" placeholder="Password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Login</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="#">
                                    <div class="modal-body">
                                        <label>Name: </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="Your name" class="form-control">
                                        </div>
                                        <label>Phone: </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="Phone Number" class="form-control">
                                        </div>
                                        <label>Email: </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="example@example.com" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Continue
                                                as Guest</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/book-profile.js"></script>
<script src="../assets/js/main.js"></script>
