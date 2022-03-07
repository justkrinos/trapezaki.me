<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <!-- Datatable Css Include -->
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include("admin.components.sidebar")
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Pending Requests</h3>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg" id="tableSort">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-8 clicktoCust">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/5.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="clicktoCust">
                                                <p class="mb-0" data-type="date" data-format="DD/MM/YYYY">07/12/2020</p>
                                            </td>
                                            <td class="d-flex flex-nowrap">
                                                <a href="#" class="btn btn-outline-danger">Decline</a>
                                                <a href="#" class="btn btn-outline-success">Accept</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="col-8 clicktoCust">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/2.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">Si ioakim</p>
                                                    </div>
                                            </td>
                                            <td class="clicktoCust">
                                                <p class=" mb-0" data-type="date" data-format="DD/MM/YYYY">10/05/2021
                                                </p>
                                            </td>
                                            <td class="d-flex flex-nowrap">
                                                <a href="#" class="btn btn-outline-danger">Decline</a>
                                                <a href="#" class="btn btn-outline-success">Accept</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="col-8 clicktoCust">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="../assets/images/faces/5.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                    </div>
                                            </td>
                                            <td class="clicktoCust">
                                                <p class=" mb-0" data-type="date" data-format="DD/MM/YYYY">09/6/2021</p>
                                            </td>
                                            <td class="d-flex flex-nowrap">
                                                <a href="#" class="btn btn-outline-danger">Decline</a>
                                                <a href="#" class="btn btn-outline-success">Accept</a>
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
                <p>2021 &copy; Mazer</p>
            </div>
        </div>
    </footer>
    </div>
    </div>

</body>

<!-- Datatable Js Include -->
<script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/pending-req.js"></script>
<script src="../assets/js/main.js"></script>

</html>
