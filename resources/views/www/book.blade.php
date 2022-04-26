<!DOCTYPE html>
<html lang="en">

@php
    use App\Models\Table;
@endphp

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

    {{-- Fancy input number dependency --}}
    <link rel="stylesheet" href="/assets/css/input-number.css">

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
                                        <div class="input-group col-sm-3 mb-3">
                                            <button class="prev-day btn btn-outline-secondary btn-google"><i
                                                    class="bi bi-chevron-left" aria-hidden='true'></i></button>
                                            <input type="date" class="form-control no-prev date-slide @error('date') is-invalid @enderror" name="txtDate"
                                                style="min-width: 66px;" id="resv-date">
                                                <div class="invalid-feedback">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
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
                        @if(Table::where("user2_id",$user2->id)->first())
                            <div class="fabric-canvas-wrapper">
                                <canvas id="canvas" width="812" height="512"></canvas>
                            </div>
                        @else
                            <h1 style="color:red">No Floor Plan</h1>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Modal starts here-->
            @include('www.components.book-modal')

            <span id="username" user="{{$user2->username}}"></span>


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

{{--Toast dependencies--}}
<script src="/assets/vendors/toastify/toastify.js"></script>
<script src="/assets/js/extensions/toastify.js"></script>

@include("components.toasts");

<script src="/assets/js/user3-fabric-resv.js"></script>
<script src="/assets/js/user3-resv-options.js"></script>

<script src="/assets/js/date-no-prev.js"></script>
<script src="/assets/js/reservation-date.js"></script>

<script src="/assets/js/main-noside.js"></script>

{{-- Fancy input number dependency --}}
<script src="/assets/js/input-number.js"></script>
