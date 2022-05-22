<!DOCTYPE html>
<html lang="en">

{{-- TODO: ama kamneis sort en fkennun ta popup --}}

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

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        {{-- TODO: na mpoun numbers gia ta ratings pending
            j pano sto username j sta list items tu
            j sto sidebar dipla gia ulla ta pages
        //- gia osa thelun rate en grafi arithmo an en paginated
        //- episis en fefki to cancel reservation ute fenete to cancelled details --}}

        @include('www.components.sidebar')

        <div id="main" class='layout-navbar'>

            @include('www.components.navbar')

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
                                                                        data-bs-toggle="tab" href="#upcoming" role="tab"
                                                                        aria-controls="upcoming"
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
                                                                <div class="tab-pane fade show active" id="upcoming"
                                                                    role="tabpanel" aria-labelledby="home-tab">

                                                                    <!-- table hover -->
                                                                    <div class="table-responsive">
                                                                        <table id="upcomingTable"
                                                                            class="table table-hover mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Place</th>
                                                                                    <th>Time</th>
                                                                                    <th>Date</th>
                                                                                    <th>People</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                @foreach ($upcomingReservations as $reservation)
                                                                                    <tr>
                                                                                        <td class="resvID"
                                                                                            hidden>
                                                                                            {{ $reservation->id }}
                                                                                        </td>
                                                                                        <td class="resvPopup">
                                                                                            {{ $reservation->user2->business_name }}
                                                                                        </td>
                                                                                        <td class="resvTime resvPopup">
                                                                                            {{ $reservation->time }}
                                                                                        </td>
                                                                                        <td class="resvPopup">
                                                                                            {{ $reservation->date }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="resvPeople2 resvPopup">
                                                                                            <span
                                                                                                class="resvPeople">{{ $reservation->pax }}</span>
                                                                                        </td>
                                                                                        <td class="resvDetails"
                                                                                            hidden>
                                                                                            {{ $reservation->details }}
                                                                                        </td>
                                                                                        <td class="resvTable"
                                                                                            hidden>
                                                                                            {{ $reservation->table_id }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>

                                                                <div class="tab-pane fade" id="completed"
                                                                    role="tabpanel" aria-labelledby="completed-tab">

                                                                    {{-- <!-- table hover --> --}}
                                                                    <div class="table-responsive">
                                                                        <table id="pastTable"
                                                                            class="table table-hover mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Place</th>
                                                                                    <th>Date</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($pastReservations as $reservation)
                                                                                    <tr>
                                                                                        <td class="pastResv"
                                                                                            hidden>true</td>
                                                                                        <td class="resvID"
                                                                                            hidden>
                                                                                            {{ $reservation->id }}
                                                                                        </td>
                                                                                        <td class="resvDetails"
                                                                                            hidden>
                                                                                            {{ $reservation->details }}
                                                                                        </td>
                                                                                        <td class="resvTable"
                                                                                            hidden>
                                                                                            {{ $reservation->table_id }}
                                                                                        </td>
                                                                                        <td class="resvTime"
                                                                                            hidden>
                                                                                            {{ $reservation->time }}
                                                                                        </td>
                                                                                        <td class="resvPopup">
                                                                                            {{ $reservation->user2->business_name }}
                                                                                        </td>
                                                                                        <td class="resvPopup">
                                                                                            {{ $reservation->date }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{-- An den en cancelled j an den eshi rating tote vartu button --}}
                                                                                            @if (!$reservation->rating && !$reservation->cancelled && $reservation->attended)
                                                                                                <div class="col-md-5 col-12"
                                                                                                    resv="{{ $reservation->id }}">
                                                                                                    <button
                                                                                                        class="btn text-nowrap btn-outline-info btn-sm btn-block rate">Rate
                                                                                                        Now!</button>
                                                                                                </div>
                                                                                                {{-- An en cancelled vartu oti en cancelled gt en prp na kami rate --}}
                                                                                            @elseif($reservation->cancelled)
                                                                                                Cancelled
                                                                                            @elseif(!$reservation->attended)
                                                                                                Not Attended
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
                                </section>
                            </div>
                        </div>
                        {{-- <!-- Hoverable rows end --> --}}


                    </div>
                </div>
            </div>
        </div>

        @include('www.components.rating-modal')
        @include('www.components.resv-modal')
        @include('www.components.cancel-resv-modal')

    </div>

    @include('www.components.footer')

</body>

</html>

{{-- Datatable Js Include --}}
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>


<!-- Rater Plugin -->
<script src="../assets/vendors/rater-js/rater-js.js"></script>
<script src="../assets/js/my-resv.js"></script>

<script src="../assets/js/main-nosidepop.js"></script>

{{-- Toast dependencies --}}
<script src="assets/vendors/toastify/toastify.js"></script>
@include('components.toasts')
