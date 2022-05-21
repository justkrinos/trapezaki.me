<!DOCTYPE html>
<html lang="en">



{{-- TODO:  //- Na mpoun oi photos se blocks p na fenunte wraia j na tes tsillas j na kamnun pop up
                    opws dame https://www.e-table.cy/restaurant/pier-one-cafe-restobar
            //- To location na sioureftoume oti dulefki
            //- To sidebar na sasei j dame j se ulla tu user1
            //- to book na pai se selida p kamnei book
            //- Na sasun oi santanoshies me tin php
            //- To modal na mpi sta components alla na dw an dulefki prota
            //- todo ta photos se mobile mode ennen orizontia

--}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - {{$user2->business_name}}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

    {{--Nano gallery--}}
    <link href="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">

</head>

<body>
    <div id="app">

        @include('www.components.sidebar')

        <div class='layout-navbar'>

            @include('www.components.navbar')

            <div id="main-content">
                <div class="container">
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">

                                        <img src="../assets/images/uploads/{{$user2->logo()}}" alt="logo">
                                    </div>
                                    <div class="ms-3 name">
                                        <h2 class="font-bold text-nowrap">{{ $user2->business_name }}
                                        </h2>
                                    </div>
                                    <div class="container">
                                        <button class="btn btn-light-primary text-nowrap" type="button" id="btnBack"
                                            style="float: right;">
                                            <svg class="bi" width="1em" height="1em" fill="currentColor">
                                                <use
                                                    xlink:href="/assets/vendors/bootstrap-icons/bootstrap-icons.svg#arrow-left-circle-fill">
                                                </use>
                                            </svg>
                                            Back</button>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Description</h4>
                                        </div>
                                        <div class="card-body">
                                            {!! nl2br(e($user2->description)) !!}
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div clas="card-body">
                                            <div class="col-sm-12 d-flex justify-content-center">
                                                <form></form>
                                                <button class="btn btn-primary" user="{{$user2->username}}"{{-- An ise logged in perni se apefthias sto book --}}
                                                    @auth('user3') id="btnBook" @endauth {{-- An den ise logged in fkalli su popup --}} @guest
                                                    id="btnPop" @endguest style="margin:5px;"> Book
                                                    Now</button>
                                                <a class="btn btn-primary" href="/user/{{ $user2->username}}/menu"  target="_blank" style="margin:5px;" id="resvMenu">Menu</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Photos</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="gallery"></div>
                                                <span id="user-photos">

                                                @foreach($user2->photos as $photo)
                                                        <span class="photo" img="{{$photo->photo_path}}"></span>
                                                @endforeach

                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card" href="#location">
                                        <div class="card-header">
                                            <h4 class="card-title">Location</h4>
                                        </div>

                                        <div class="card-body">
                                            <iframe src = "https://maps.google.com/maps?q={{$user2->lat}},{{$user2->long}}&hl=es;z=14&amp;output=embed"
                                            frameborder="0" style="border:0; width: 100%; height: 290px;"
                                             loading="lazy"
                                             referrerpolicy="no-referrer-when-downgrade"
                                            allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                    </section>

                </div>
            </div>

            @include('www.components.login-modal')
            @include('www.components.footer')
</body>

</html>



<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/book-profile.js"></script>


<script src="../assets/js/main-nosidepop.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/jquery.nanogallery2.min.js"></script>
<script src="../assets/js/photo-gallery.js"></script>


