<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - My Reservations</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <!-- Rater Stylesheet-->
    <link rel="stylesheet" href="../assets/vendors/rater-js/style.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
    {{-- TODO: na mpoun popups gia ta ratings
    j pano sto username j sta list items tu
    j sto sidebar dipla gia ulla ta pages--}}

        @include("www.components.sidebar")

        <div id="main" class='layout-navbar'>

            @include("www.components.navbar")

            <div id="main-content">

                <div class="container card-transparent mb-4">
                    <h3>My Reservations</h3>
                </div>

                <div class="container card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                <!-- Hoverable rows start -->
                                <section class="section">
                                    <div class="row" id="table-hover-row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">

                                                    <section class="section">

                                                        <div class="row">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                        <li class="nav-item" role="presentation">
                                                                            <a class="nav-link active" id="upcoming-tab"
                                                                                data-bs-toggle="tab" href="#upcoming"
                                                                                role="tab" aria-controls="upcoming"
                                                                                aria-selected="false">Upcoming</a>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                            <a class="nav-link" id="completed-tab"
                                                                                data-bs-toggle="tab" href="#completed"
                                                                                role="tab" aria-controls="completed"
                                                                                aria-selected="false">Completed <span
                                                                                    class="badge bg-info"
                                                                                    id="notification"></span></a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content" id="myTabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="upcoming" role="tabpanel"
                                                                            aria-labelledby="home-tab">

                                                                            <!-- table hover -->
                                                                            <div class="table-responsive">
                                                                                <table class="table table-hover mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Place</th>
                                                                                            <th>Time</th>
                                                                                            <th>People</th>
                                                                                            <th>Date</th>
                                                                                            <!-- Analogws me ti ena epileksei na tu fkallei to analogo text -->
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr class="resvPopup">
                                                                                            <td>Bordello</td>
                                                                                            <!-- Reservation number should be included but hidden gia na liturgisi me to modal -->
                                                                                            <td class="time">18:00</td>
                                                                                            <td><span
                                                                                                    class="people">3</span>
                                                                                            </td>
                                                                                            <td>5/10/2022</td>
                                                                                        </tr>
                                                                                        <tr class="resvPopup">
                                                                                            <td>Gwnia</td>
                                                                                            <td class="time">20:00</td>
                                                                                            <td> <span
                                                                                                    class="people">10</span>
                                                                                            </td>
                                                                                            <td>13/3/2022</td>
                                                                                        </tr>
                                                                                        <tr class="resvPopup">
                                                                                            <td>Sherlock's Home</td>
                                                                                            <td class="time">18:14</td>
                                                                                            <td> <span
                                                                                                    class="people">5</span>
                                                                                            </td>
                                                                                            <td>25/3/2022</td>
                                                                                        </tr>
                                                                                        <tr class="resvPopup">
                                                                                            <td>Pralina</td>
                                                                                            <td class="time">16:00</td>
                                                                                            <td> <span
                                                                                                    class="people">4</span>
                                                                                            </td>
                                                                                            <td>3/1/2022</td>
                                                                                        </tr>
                                                                                        <tr class="resvPopup">
                                                                                            <td>Theoria kai Praxi</td>
                                                                                            <td class="time">22:00</td>
                                                                                            <td> <span
                                                                                                    class="people">5</span>
                                                                                            </td>
                                                                                            <td>19/1/2022</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade" id="completed"
                                                                            role="tabpanel"
                                                                            aria-labelledby="completed-tab">

                                                                            <!-- table hover -->
                                                                            <div class="table-responsive">
                                                                                <table class="table table-hover mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Place</th>
                                                                                            <th>Date</th>
                                                                                            <th>Rating</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr id="8">
                                                                                            <td>Bordello</td>
                                                                                            <td>5/10/2022</td>
                                                                                            <td>
                                                                                                <div
                                                                                                    class="col-md-5 col-12">
                                                                                                    <button
                                                                                                        class="btn text-nowrap btn-outline-info btn-sm btn-block rate">Rate
                                                                                                        Now!</button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr id="7">
                                                                                            <td>Gwnia</td>
                                                                                            <td>13/3/2022</td>
                                                                                            <td>
                                                                                                <div
                                                                                                    class="col-md-5 col-12">
                                                                                                    <button
                                                                                                        class="btn text-nowrap btn-outline-info btn-sm btn-block rate">Rate
                                                                                                        Now!</button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr id="6">
                                                                                            <td>Sherlock's Home</td>
                                                                                            <td>25/3/2022</td>
                                                                                            <td>Rating added</td>
                                                                                        </tr>
                                                                                        <tr class="resvPopup">
                                                                                            <td>Pralina</td>
                                                                                            <td>3/1/2022</td>
                                                                                            <td>Rating added</td>
                                                                                        </tr>
                                                                                        <tr id="5">
                                                                                            <td>Theoria kai Praxi</td>
                                                                                            <td>19/1/2022</td>
                                                                                            <td>
                                                                                                <div
                                                                                                    class="col-md-5 col-12">
                                                                                                    <button
                                                                                                        class="btn text-nowrap btn-outline-info btn-sm btn-block rate">Rate
                                                                                                        Now!</button>
                                                                                                </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Hoverable rows end -->


                            </div>
                        </div>
                    </div>
                </div>

                <!-- rating modal -->
                <div class="modal fade text-left" id="small" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel19" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel19">Rate your experience</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <div id="rating"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                                    <span class="d-sm-block">Close</span>
                                </button>
                                <button type="button" id="rateConfirm" class="btn btn-primary ml-1 btn-sm"
                                    data-bs-dismiss="modal">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- rating modal end-->


                <!-- Reservation modal starts here-->
                <div class="modal fade" id="myresvModal" tabindex="-1" role="dialog"
                    aria-labelledby="myresvModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myresvModalCenterTitle">Reservation Details
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- body here-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="flex-nowrap input-group col-md-5 mb-4">
                                                <label class="input-group-text" for="myresvBusiness">Reservation
                                                    No.</label>
                                                <label type="text" class="form-control"
                                                    id="myresvBusiness">35234</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="d-flex input-group col-md-3 mb-3">
                                                <label class="input-group-text" for="myresvType">Table</label>
                                                <div class="col-4">
                                                    <label type="text" class="form-control" id="myresvType">4</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-1">
                                            <div class="input-group mb-3 col-md-3">
                                                <label class="input-group-text" for="myresvType">People</label>
                                                <div class="col-4">
                                                    <label type="text" class="form-control col-3"
                                                        id="myresvType">4</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="col-md-4 mb-4">
                                                <div class="input-group mb-4">
                                                    <label class="input-group-text" for="myresvImportance">Time</label>
                                                    <label type="text" class="form-control"
                                                        id="myresvImportance">18:00</label>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <br>
                                        <div class="card">
                                            <h6 class="" for="myresvTextArea">Details</h6>
                                            <label class="form-control" id="myresvTextArea">The description
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
                                        <button type="button" id="modCancel" class="btn btn-light-secondary">
                                            <span class="d-block d-sm-block">Cancel Reservation</span>
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
                <div class="modal fade text-left" id="confirmModal" tabindex="-1" role="dialog" data-bs-backdrop="false"
                    aria-labelledby="myModalLabel19" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title white" id="myModalLabel19">Warning</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to cancel the reservation?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
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
                <!-- Confirmation modal ends here -->


            </div>
        </div>

</body>

</html>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/date-no-prev.js"></script>

<!-- Rater Plugin -->
<script src="../assets/vendors/rater-js/rater-js.js"></script>
<script src="../assets/js/my-resv.js"></script>

<script src="../assets/js/main-nosidepop.js"></script>
