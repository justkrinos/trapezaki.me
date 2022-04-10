<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Pending Requests</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="../assets/vendors/toastify/toastify.css">

    <!-- Datatable Css Include -->
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('admin.components.sidebar')
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
                                            <th>Date/Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users2 as $user)

                                            <tr class="user" username="{{ $user->username }}">
                                                <td class="col-8">
                                                    <a href="/user/{{ $user->username }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img
                                                                    src="../assets/images/uploads/{{ $user->logo() }}">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0">{{ $user->username }}</p>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <p class="mb-0" data-type="date"
                                                        style="overflow: auto; height: 60px; width: 150px;"
                                                        data-format="DD/MM/YYYY">{{ $user->created_at }}</p>
                                                </td>
                                                <td class="d-flex flex-nowrap">
                                                        @csrf
                                                        <button class="btn btn-outline-success accept">Accept</button>
                                                        <button class="btn btn-outline-danger decline">Decline</button>
                                                </td>

                                            </tr>
                                        @endforeach

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

</body>

<!-- Datatable Js Include -->
<script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

{{-- Include for flash messages --}}
<script src="../assets/vendors/toastify/toastify.js"></script>

<script src="../assets/js/pending-req.js"></script>
<script src="../assets/js/main.js"></script>

</html>
