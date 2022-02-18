<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Manage Reservations</title>

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
        <div id="sidebar" class="active">
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

                        <li class="sidebar-item ">
                            <a href="/profile" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="/manage-resv" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Manage Reservations</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="/report-problem" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Report a Problem</span>
                            </a>
                        </li>

                        <li class="sidebar-item " hidden>
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

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Manage Reservations</h3>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="mydate">Date</label>
                                    <input type="date" class="form-control" style="min-width: 66px;" id="mydate">
                                </div>
                            </div>

                            <div class="mb-1">
                                <label for="formFileMultiple" class="form-label">*Res = Reserved</label>
                            </div>

                            <div class="mb-1">
                                <label for="formFileMultiple" class="form-label">*Arr = Arrived</label>
                            </div>

                            <!-- Hoverable rows start -->
                            <section class="section">
                                <div class="row" id="table-hover-row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                </div>
                                                <!-- table hover -->
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0" id="resTable">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>ResNum</th> -->
                                                                <th>Time</th>
                                                                <th>Name</th>
                                                                <th>Res.</th>
                                                                <th>Arr.</th>
                                                                <th>Table</th>
                                                                <!-- Analogws me ti ena epileksei na tu fkallei to analogo text -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="resvPopup">
                                                                <td id="resNum" hidden>24</td>
                                                                <!-- Reservation number should be included but hidden gia na liturgisi me to modal -->
                                                                <td class="time">18:00</td>
                                                                <td class="text-bold-500">Santiago Alonso</td>
                                                                <td>
                                                                    <span class="people">3</span>
                                                                </td>
                                                                <td>
                                                                    <span class="attendance">0</span>
                                                                </td>
                                                                <td>#5</td>

                                                            </tr>
                                                            <tr class="resvPopup">
                                                                <td class="time">20:00</td>
                                                                <td class="text-bold-500">O Jiris M</td>
                                                                <td>
                                                                    <span class="people">3</span>
                                                                </td>
                                                                <td>
                                                                    <span class="attendance">0</span>
                                                                </td>
                                                                <td>#5</td>
                                                            </tr>
                                                            <tr class="resvPopup">
                                                                <td class="time">18:14</td>
                                                                <td class="text-bold-500">Kostis Palamas</td>
                                                                <td>
                                                                    <span class="people">3</span>
                                                                </td>
                                                                <td>
                                                                    <span class="attendance">0</span>
                                                                </td>
                                                                <td>#5</td>
                                                            </tr>
                                                            <tr class="resvPopup">
                                                                <td class="time">12:00</td>
                                                                <td class="text-bold-500">Nicholas Nichola</td>
                                                                <td>
                                                                    <span class="people">3</span>
                                                                </td>
                                                                <td>
                                                                    <span class="attendance">0</span>
                                                                </td>
                                                                <td>#5</td>
                                                            </tr>
                                                            <tr class="resvPopup">
                                                                <td class="time">22:00</td>
                                                                <td class="text-bold-500">Andreas Efstathiou</td>
                                                                <td>
                                                                    <span class="people">3</span>
                                                                </td>
                                                                <td>
                                                                    <span class="attendance">0</span>
                                                                </td>
                                                                <td>#5</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Hoverable rows end -->
                            <div class="col-sm-12 d-flex justify-content-start form-group">
                                <form>
                                    <input type="button" id="newRes" class="btn btn-primary" value="Add Reservation" />
                                </form>
                            </div>



                            <!-- Reservation modal starts here-->
                            <div class="modal fade" id="issueModal" tabindex="-1" role="dialog"
                                aria-labelledby="issueModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="issueModalCenterTitle">Reservation Details
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">x
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- body here-->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <div class="flex-nowrap input-group col-md-5 mb-4">
                                                            <label class="input-group-text"
                                                                for="issueBusiness">Reservation No.</label>
                                                            <label type="text" class="form-control"
                                                                id="issueBusiness">35234</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-10">
                                                        <div class="flex-nowrap input-group col-md-5 mb-4">
                                                            <label class="input-group-text"
                                                                for="issueBusiness">Name</label>
                                                            <label type="text" class="form-control"
                                                                id="issueBusiness">Efstathios Andreou</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-10">
                                                        <div class="flex-nowrap input-group col-md-5 mb-4">
                                                            <label class="input-group-text" for="issueBusiness">Phone
                                                                Number</label>
                                                            <label type="text" class="form-control"
                                                                id="issueBusiness">99081329</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <div class="d-flex input-group col-md-3 mb-3">
                                                            <label class="input-group-text"
                                                                for="issueType">Table</label>
                                                            <div class="col-4">
                                                                <label type="text" class="form-control"
                                                                    id="issueType">4</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">People</span>
                                                            <div class="col-4">
                                                                <input type="number" id="attendance" min="0" max="4"
                                                                    class="form-control" value="0">
                                                            </div>
                                                            <span class="input-group-text">/4</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="col-md-4 mb-4">
                                                            <div class="input-group mb-4">
                                                                <label class="input-group-text"
                                                                    for="issueImportance">Time</label>
                                                                <label type="text" class="form-control"
                                                                    id="issueImportance">18:00</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <br>
                                                    <div class="card">
                                                        <h7 class="" for="issueTextArea">Description</h7>
                                                        <label class="form-control" id="issueTextArea">The description
                                                            will be
                                                            written here and might be a long one but it doenst matter
                                                            because the lines can wrap and the modal can scroll down as
                                                            much
                                                            as you want so that you can see the details written by the
                                                            customer.</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <div class="d-flex col-12">

                                                <div class="col-5">
                                                    <button type="button" id="modResv" class="btn btn-light-secondary">
                                                        <span class="d-block d-sm-block">Modify</span>
                                                    </button>
                                                    <button type="button" id="modCancel" class="btn btn-light-secondary">
                                                        <span class="d-block d-sm-block">Cancel</span>
                                                    </button>
                                                </div>

                                                <div class="d-flex justify-content-end col-7">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <span class="d-block d-sm-block">Close</span>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Reservation Modal Ends Here-->


                            <!-- Confirmation modal starts here-->
                            <div class="modal fade text-left" id="confirmModal" tabindex="-1" role="dialog"
                                data-bs-backdrop="false" aria-labelledby="myModalLabel19" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title white" id="myModalLabel19">Warning</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to cancel the reservation?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary btn-sm"
                                                data-bs-dismiss="modal">
                                                <span class="d-sm-block">Close</span>
                                            </button>
                                            <button type="button" class="btn btn-primary ml-1 btn-sm" id="confirmed"
                                                data-bs-dismiss="modal">
                                                <span class="d-sm-block">Yes</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Confirmation modal ends here -->


                    </div>
                </div>
            </div>
        </div>



        <footer>

        </footer>
    </div>
    </div>
</body>

</html>

<!-- Datatable Js Include -->
<script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/manage-resv-datatable.js"></script>
<script src="../assets/js/date-no-prev.js"></script>
<script src="../assets/js/reservations.js"></script>
