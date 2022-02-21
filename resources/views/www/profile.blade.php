<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Profile</title>

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

                        <li class="sidebar-item active">
                            <a href="/profile" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
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

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">

                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Account info</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="basicInput">Username</label>
                                            <input type="text" value="Giorkos" class="form-control" id="basicInput"
                                                readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">Name</label>
                                            <small class="text-muted"><i>(First and Last name)</i></small>
                                            <input type="text" class="form-control" id="basicInput"
                                                value="Giorgos Charalambous">

                                        </div>


                                        <div class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="text" class="form-control" id="basicInput"
                                                value="ijsij@jsgsgj.com" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">Phone number</label>

                                            <input type="text" class="form-control" id="basicInput" value="99818181">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Change</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="basicInput">Old Password</label>
                                            <input type="password" class="form-control form-control-l"
                                                placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">New Password</label>
                                            <input type="password" class="form-control form-control-l"
                                                placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">Re-enter New Password</label>
                                            <input type="password" class="form-control form-control-l"
                                                placeholder="Password">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Change</button>
                                        </div>
                                    </div>
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

<script src="../assets/js/main.js"></script>