<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Floor Plan Editor</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="/assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">


    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">

    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">

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
                <div class="page-title">

                </div>


                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid text-center">
                            <h3 class="mb-1">Floor Plan Editor</h3>
                             <p class="mb-4">{{ $user2->business_name }}</p>
                            <div class="form-group admin-menu justify-content-center">
                                @csrf
                                <div class="btn-group mb-1">
                                    <button class="btn btn-outline-primary btn-sm rectangle text-nowrap">+ &#9647;
                                        Table</button>
                                    <button class="btn btn-outline-primary btn-sm circle text-nowrap">+ &#9711; Table</button>
                                    <button class="btn btn-outline-primary btn-sm wall text-nowrap">+ &#9646; Wall</button>
                                </div>
                                <div class="btn-group mb-1">
                                {{-- TODO: efie to customer mode epd itan astoxo en efkalle kan timeslots so na fiei j pu ta eggrafa --}}
                                    <button class="btn btn-outline-danger btn-sm remove text-nowrap">@include('admin.components.delete-icon')</button>
                                    <button class="btn btn-outline-danger btn-sm clear text-nowrap">Clear All</button>
                                </div>
                                <div class="btn-group mb-1">
                                    <button class="btn btn-outline-success btn-sm save" id="save">Save</button>
                                </div>
                                <div class="btn-group mb-1">
                                    <button class="btn btn-outline-secondary btn-sm export">Export</button>
                                    <button class="btn btn-outline-secondary btn-sm import">Import</button>
                                </div>
                                <pre id="contents"></pre>
                            </div>

                            <div class="form-group customer-menu" style="display: none;">
                                <div class="btn-group">
                                    <button class="btn btn-outline-warning btn-sm admin-mode">Admin mode</button>
                                </div>
                            </div>
                        </div>
                        <div class="fabric-canvas-wrapper">
                            <canvas id="canvas" width="812" height="512"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal starts here-->
            <div class="modal fade" id="resvModal" tabindex="-1" role="dialog" aria-labelledby="resvModalCenterTitle"
                aria-hidden="true">
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
                                    <div class="col-sm-10">
                                        <div class="flex-nowrap input-group col-md-5 mb-4">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="mydate">Date</label>
                                                <input type="date" class="form-control popdate no-prev" style="min-width: 66px;"
                                                    id="mydate">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <label for="inputSlots">Availability</label>
                                            <div id="inputSlots" class="input-group col-md-5">
                                                <span id="timeSlots" class="form-control">
                                                </span>
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


            <footer>
            </footer>
        </div>
    </div>

    <span id="username" user="{{ $user2->username }}"></span>
</body>




</html>

<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src='/assets/js/fabric.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"
    integrity="sha512-ZKqmaRVpwWCw7S7mEjC89jDdWRD/oMS0mlfH96mO0u3wrPYoN+lXmqvyptH4P9mY6zkoPTSy5U2SwKVXRY5tYQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="pinch-zoom-canvas.js"></script> -->

{{-- Include for flash messages --}}
<script src="/assets/vendors/toastify/toastify.js"></script>

<script src="/assets/js/user1-fabric-resv.js"></script>
<script src="/assets/js/user1-resv-options.js"></script>

<script src="/assets/js/date-no-prev.js"></script>


<script src="/assets/js/popup-sweetalert2.js"></script>
<script src="/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

<script src="/assets/js/main.js"></script>
