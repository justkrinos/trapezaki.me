<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - &lt;Cafe Name&gt;</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

</head>

<body>
    <div id="app">

        @include("www.components.sidebar")

        <div id="main" class='layout-navbar'>

            @include("www.components.navbar")

            <div id="main-content">

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="../assets/images/faces/1.jpg" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h2 class="font-bold text-nowrap">CAFE John Duck</h2>
                                </div>
                                <div class="container">
                                    <button class="btn btn-light-primary text-nowrap" type="button" id="btnBack"
                                        style="float: right;">
                                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                                            <use
                                                xlink:href="../assets/vendors/bootstrap-icons/bootstrap-icons.svg#arrow-left-circle-fill">
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
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi?
                                        Ullam quaerat
                                        similique iusto
                                        temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic
                                        deleniti? Placeat
                                        delectus
                                        quibusdam ratione ullam!
                                    </div>
                                </div>


                                <div class="card">
                                    <div clas="card-body">
                                        <div class="col-sm-12 d-flex justify-content-center">
                                            <form></form>
                                            <button class="btn btn-primary"

                                            {{-- An ise logged in perni se apefthias sto book--}}
                                            @auth('user3')
                                                id="btnBook"
                                            @endauth


                                            {{-- An den ise logged in fkalli su popup --}}
                                            @guest
                                                id="btnPop"
                                            @endguest

                                            style="margin:5px;"> Book
                                                Now</button>
                                            <button class="btn btn-primary" style="margin:5px;"
                                                id="resvMenu">Menu</button>
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
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="../assets/images/samples/banana.jpg"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="../assets/images/samples/bg-mountain.jpg"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Location</h4>
                                    </div>
                                    <div class="card-body">
                                        <iframe
                                            src="https://maps.google.com/maps?q=CUT%20cyprus&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                            frameborder="0" style="border:0; width: 100%; height: 290px;"
                                            allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>

        <!--login form Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center" id="myModalLabel33">Please
                            Log in to continue.</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Have an Account</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Continue as
                                    Guest</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <span id="login">
                                    {{-- tuto tulefki me javascript. see book-profile.js --}}
                                    @include('www.components.login-pop')
                                </span>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <span id="guest">
                                    {{-- tuto tulefki me javascript. see book-profile.js --}}
                                    @include('www.components.guest-pop')
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/book-profile.js"></script>
<script src="../assets/js/main.js"></script>
