<!DOCTYPE html>
<html lang="en">

{{--
TODO ta session variables pu katw en tha fenunte stin forma, enna pernoun apefthias ston controller opws to ekama
TODO ta mona p ena eshi stin forma ennan ta stoixeia tis kratisis

Name: {{ session()->get('full_name')}}
Phone: {{ session()->get('phone')}}
Email: {{ session()->get('email')}}

<form method="POST" action="/seven-seas/book">
@csrf
<button type="submit">Submit Booking</button>
</form>

<br>
<br>
TODO: Submit popup successfull j otan kamnis click ok na ginete redirect piso sto make a reservation --}}

{{-- TODO: na iparxei to navbar j to sidebar swsta --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Floor Plan Editor</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">

    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">

</head>

<body>
    <div id="app">

        <header class="mb-4">

        </header>
        <div class="container">
            <div class="page-heading">
                <div class="page-title">

                </div>


                <div class="card">

                    <div class="card-header">
                        @include('components.back-button')
                        <div class="container-fluid text-center">
                            <h3 class="mb-4k mb-4">Select a Table</h3>
                            <div class="d-flex justify-content-center mb-2">
                                <div class="col-md-6">
                                    <div class="flex-nowrap">
                                        <div class="input-group col-sm-3">
                                            <button class="prev-day btn btn-outline-secondary btn-google"><i
                                                    class="bi bi-chevron-left" aria-hidden='true'></i></button>
                                            <input type="date" class="form-control no-prev date-slide"
                                                style="min-width: 66px;" id="resv-date">
                                            <button class='next-day btn btn-outline-secondary btn-google'><i
                                                    class='bi bi-chevron-right' aria-hidden='true'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group customer-menu" style="display: none;">
                                <div class="btn-group">
                                    <button class="btn btn-warning btn-sm admin-mode">Admin mode</button>
                                </div>
                            </div>
                        </div>
                        {{-- Floor Plan --}}
                        <div class="fabric-canvas-wrapper">
                            <canvas id="canvas" width="812" height="512"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal starts here-->
            <div class="modal fade" id="resvModal" tabindex="-1" role="dialog"
                aria-labelledby="resvModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resvModalCenterTitle">Book a Table
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                x
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- body here-->
                            <div class="card-body container-fluid">
                                <div class="row justify-content-center">

                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <label for="inputSlots">Availabiliy</label>
                                            <div id="inputSlots" class="input-group col-md-5">
                                                <span id="timeSlots" class="form-control row-cols-6"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <span id="btnBook"></span>
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <span class="d-sm-block" id="closeResvModal">Close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <span id="username" user="{{ $user2->username }}"></span>


            <footer>
            </footer>
        </div>
    </div>

</body>




</html>



<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src='/assets/js/fabric.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"
integrity="sha512-ZKqmaRVpwWCw7S7mEjC89jDdWRD/oMS0mlfH96mO0u3wrPYoN+lXmqvyptH4P9mY6zkoPTSy5U2SwKVXRY5tYQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="/assets/js/date-findtime.js"></script>

<script src="/assets/vendors/toastify/toastify.js"></script>

<script src="/assets/js/user3-fabric-resv.js"></script>
<script src="/assets/js/user3-resv-options.js"></script>

<script src="/assets/js/date-no-prev.js"></script>
<script src="/assets/js/reservation-date.js"></script>

<script src="/assets/js/main-noside.js"></script>
