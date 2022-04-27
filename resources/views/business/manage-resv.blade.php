<!DOCTYPE html>
<html lang="en">

@php
use App\Models\Reservation;
use App\Models\User3;
use App\Models\Table;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Manage Reservations</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">


    {{-- Toast dependency --}}
    <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">

    <!-- Datatable Css Include -->
    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        {{-- Include the sidebar from /business/components --}}
        @include('business.components.sidebar')


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
                            <div class="col-md-6">
                                <form method="POST" action="/manage-reservations" id="dateInput">
                                    @csrf
                                    <div class="input-group">
                                        <label class="input-group-text" for="mydate">Date</label>
                                        <input type="date" class="form-control" style="min-width: 66px;" name="date"
                                            id="mydate" value="{{ $date }}">
                                    </div>
                                </form>
                            </div>

                            {{-- TODO:
                                //-na kamume legend dame me circle xromata pu na eksigun to kathe xroma
                                eg. (kuklos kokkino) Not Attended
                                //- na dixnume kapos j ta cancelled reservations
                                //- na mporei na kamnei search reservations me cancelled j not attended klp --}}

                            <!-- Hoverable rows start -->
                            <section class="section">
                                <div class="row" id="table-hover-row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                </div>
                                                {{-- <!-- table hover --> --}}
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0" id="resTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Time</th>
                                                                <th>Name</th>
                                                                <th>People</th>
                                                                <th>Table</th>
                                                                {{-- <!-- Analogws me ti ena epileksei na tu fkallei to analogo text --> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <input id="currentDate" type="hidden" value="">
                                                            {{-- TODO na erkunte pu to view tuta --}}
                                                            @foreach (App\Models\Reservation::all() as $reservation)
                                                                @if ($reservation->date == $date)
                                                                    <tr class="resvPopup">
                                                                        <td class="time">
                                                                            {{ $reservation->time }}</td>
                                                                        <td class="customerName"
                                                                            class="text-bold-500">
                                                                            {{ User3::find($reservation->user3_id)->full_name }}
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="attendance">{{ $reservation->attended }}</span>/<span
                                                                                class="people">{{ $reservation->pax }}</span>
                                                                        </td>
                                                                        <td>{{ $reservation->table->table_no }}</td>
                                                                        <td class="details" hidden>
                                                                            {{ $reservation->details }}
                                                                        </td>
                                                                        <td class="res_id" hidden>
                                                                            {{ $reservation->id }}
                                                                        </td>
                                                                        <td class="table_no" hidden>
                                                                            {{ Table::find($reservation->table_id)->table_no }}
                                                                        </td>
                                                                        <td class="phone" hidden>
                                                                            {{ User3::find($reservation->user3_id)->phone }}
                                                                        </td>
                                                                        <td class="people" hidden>
                                                                            {{ $reservation->pax }}
                                                                        </td>
                                                                        <td id="resNum" hidden>{{ $reservation->id }}
                                                                        </td>
                                                                        <td hidden>
                                                                            <span class="cancelled">
                                                                                @if ($reservation->cancelled)
                                                                                    1
                                                                                @else
                                                                                    0
                                                                                @endif
                                                                            </span>
                                                                        </td>
                                                                        <td hidden>
                                                                            @if ($reservation->cancelled)
                                                                                <span
                                                                                    class="reason">{{ $reservation->cancelled->reason }}</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- <!-- Hoverable rows end --> --}}

                            {{-- TODO: nan apla button oi forma tuto katw --}}
                            <div class="col-sm-12 d-flex justify-content-start form-group">
                                <form>
                                    <input type="button" id="newRes" class="btn btn-primary" value="Add Reservation" />
                                </form>

                            </div>

                            @include('business.components.resv-modal')
                            @include('business.components.cancel-resv-modal')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('business.components.footer')
</body>

</html>

<!-- Datatable Js Include -->
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/jquery-3.6.0.min.js"></script>

<script src="/assets/js/manage-resv-datatable.js"></script>
<script src="/assets/js/reservations.js"></script>

{{-- Toast dependencies --}}
<script src="assets/vendors/toastify/toastify.js"></script>
@include('components.toasts')

{{-- modal dependencies --}}
<script src="/assets/js/manage-reservations-modal.js"></script>
