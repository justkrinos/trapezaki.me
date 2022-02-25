<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>


<html lang="en">


<body>
    <div id="app">
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
                <div>
                    <a href="/logout">Logout</a>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active">
                            <a href="/manage-customer" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Manage Customers</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/pending-requests" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Pending Requests</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="/issues" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Issues</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Manage Customers</h3>
            </div>

            <div class="page-content">
                <div class="col-md-4 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" id="SearchCust" class="form-control" placeholder="Find Businesses"
                            aria-label="Find Businesses" aria-describedby="button-addon2">
                    </div>

                    <div class='form-check'>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkActive" class='form-check-input' unchecked>
                                    <label for="checkActive">Active</label>
                                </div>
                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkDisabled" class='form-check-input' unchecked>
                                    <label for="checkDisabled">Disabled</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="CustTable" class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Member Since</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-8">
                                                <a href="/seven-seas">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/5.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0 text-nowrap">Si Cantik</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>5/10/2020</td>
                                            <td class="text-center">
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-8">
                                                <a href="/seven-seas">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/2.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0 text-nowrap">Si Ganteng</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>5/10/2020</td>
                                            <td class="text-center">
                                                <span class="badge bg-secondary">Disabled</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-8">
                                                <a href="/seven-seas">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/2.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0 text-nowrap">Gai Santeng</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>5/10/2020</td>
                                            <td class="text-center">
                                                <span class="badge bg-secondary">Disabled</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-8">
                                                <a href="/manage-customer">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/2.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0 text-nowrap">Si Ganteng</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>5/10/2020</td>
                                            <td class="text-center">
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    </section>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Trapezaki</p>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/search-cust.js"></script>
</body>

</html>
