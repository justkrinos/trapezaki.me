<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - My Reservations</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    {{-- Datatable Css Include --}}
    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">

    <!-- Rater Stylesheet-->
    <link rel="stylesheet" href="/assets/vendors/rater-js/style.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<body>
    <div id="app">
    {{-- TODO: na mpoun numbers gia ta ratings pending
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
                                                                                <table id="upcomingTable" class="table table-hover mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Place</th>
                                                                                            <th>Time</th>
                                                                                            <th>Date</th>
                                                                                            <th>People</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @foreach($upcomingReservations as $reservation)
                                                                                        <tr class="resvPopup">
                                                                                            <td class="resvID" hidden>{{$reservation->id}}</td>
                                                                                            <td>{{ $reservation->user2->business_name }}</td>
                                                                                            <td class="resvTime">{{$reservation->time}}</td>
                                                                                            <td>{{$reservation->date}}</td>
                                                                                            <td><span class="resvPeople">{{$reservation->pax}}</span></td>
                                                                                            <td class="resvDetails" hidden>{{$reservation->details}}</td>
                                                                                            <td class="resvTable" hidden>{{$reservation->table_id}}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade" id="completed"
                                                                            role="tabpanel"
                                                                            aria-labelledby="completed-tab">

                                                                            <!-- table hover -->
                                                                            <div class="table-responsive">
                                                                                <table id="pastTable" class="table table-hover mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Place</th>
                                                                                            <th>Date</th>
                                                                                            <th>Status</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @foreach($pastReservations as $reservation)
                                                                                        <tr>
                                                                                            <td>{{$reservation->user2->business_name}}</td>
                                                                                            <td>{{$reservation->date}}</td>
                                                                                            <td>
                                                                                            {{-- TODO: na checkarunte j ta cancellations --}}
                                                                                            {{-- An den en cancelled j an den eshi rating tote vartu button --}}
                                                                                            @if(!$reservation->rating && !$reservation->cancelled)
                                                                                                <div
                                                                                                    class="col-md-5 col-12">
                                                                                                    <button
                                                                                                        class="btn text-nowrap btn-outline-info btn-sm btn-block rate">Rate
                                                                                                        Now!</button>
                                                                                                </div>
                                                                                            {{-- An en cancelled vartu oti en cancelled gt en prp na kami rate --}}
                                                                                            @elseif($reservation->cancelled)
                                                                                                Cancelled

                                                                                            {{-- Aliws eshei rating ara ok --}}
                                                                                            @else
                                                                                                Completed
                                                                                            @endif
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

                @include('www.components.resv-modal')

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

 {{-- Datatable Js Include  --}}
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>



<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<!-- Rater Plugin -->
<script src="../assets/vendors/rater-js/rater-js.js"></script>
<script src="../assets/js/my-resv.js"></script>

<script src="../assets/js/main-nosidepop.js"></script>
