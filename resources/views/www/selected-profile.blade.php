<!DOCTYPE html>
<html lang="en">

@php
use App\Models\User2;
use App\Models\User2_Photo;

$username = Request::segment(2);
$user2= User2::where('username', $username)
        ->first();

@endphp



{{-- TODO:  //- Na mpoun oi photos se blocks p na fenunte wraia j na tes tsillas j na kamnun pop up
                    opws dame https://www.e-table.cy/restaurant/pier-one-cafe-restobar
            //- To location na sioureftoume oti dulefki
            //- To sidebar na sasei j dame j se ulla tu user1
            //- to book na pai se selida p kamnei book
            //- Na sasun oi santanoshies me tin php
            //- To modal na mpi sta components alla na dw an dulefki prota
            //- TO BACK EN DULEFKI
--}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - {{$user2->business_name}}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    {{--Nano gallery--}}
    <link href="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

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

                                        <img src="../assets/images/uploads/{{User2_Photo::where('user2_id',$user2->id)->where('photo_path','like','logo%')->get()->first()->photo_path}}" alt="Face 1">
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
                                            {{ $user2->description }}
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div clas="card-body">
                                            <div class="col-sm-12 d-flex justify-content-center">
                                                <form></form>
                                                <button class="btn btn-primary" {{-- An ise logged in perni se apefthias sto book --}}
                                                    @auth('user3') id="btnBook" @endauth {{-- An den ise logged in fkalli su popup --}} @guest
                                                    id="btnPop" @endguest style="margin:5px;"> Book
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
                                                <div id="gallery"></div>
                                                <span id="user-photos">

                                                @foreach(User2_Photo::where('user2_id',$user2->id)->get() as $photo)
                                                    @if(!str_starts_with($photo->photo_path,'logo'))
                                                        <span class="photo" img="{{$photo->photo_path}}"></span>
                                                    @endif
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

            {{-- login form Modal --}}
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="text-center" id="myModalLabel33">Please
                                select an option to continue</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Have an Account</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Continue as
                                        Guest</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form action="#">
                                        @csrf
                                        <div class="modal-body">

                                            <input class="is-invalid text-center" hidden>
                                            <div class="invalid-feedback">
                                                <i id="login-error" class="bx bx-radio-circle"></i>
                                            </div>

                                            <label>Username: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Username or Email" id="username"
                                                    class="form-control">
                                            </div>
                                            <label>Password: </label>
                                            <div class="form-group">
                                                <input type="password" placeholder="Password" id="password"
                                                    class="form-control">
                                            </div>
                                            <a href="/signup">Don't have an account? Signup</a>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <span class="d-sm-block">Close</span>
                                            </button>
                                            <button type="button d-sm-block" id="btnLogin" class="btn btn-primary ml-1">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <form action="#">
                                        @csrf
                                        <div class="modal-body">

                                            <label>Name: </label>
                                            <div class="form-group">
                                                <input type="text" id="full_name" placeholder="Your name"
                                                    class="form-control">
                                                <div class="invalid-feedback">
                                                    <i id="full_name-error" class="bx bx-radio-circle"></i>
                                                </div>
                                            </div>

                                            <label>Phone: </label>
                                            <div class="form-group">
                                                <input type="text" id="phone" placeholder="Phone Number"
                                                    class="form-control">
                                                <div class="invalid-feedback">
                                                    <i id="phone-error" class="bx bx-radio-circle"></i>
                                                </div>
                                            </div>

                                            <label>Email: </label>
                                            <div class="form-group">
                                                <input type="text" id="email" placeholder="example@example.com"
                                                    class="form-control">
                                                <div class="invalid-feedback">
                                                    <i id="email-error" class="bx bx-radio-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <span class="d-sm-block">Close</span>
                                            </button>
                                            <button type="button" id="btnGuest" class="btn btn-primary ml-1">
                                                <span class="d-sm-block">Continue</span>
                                            </button>
                                        </div>
                                    </form>

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


<script src="../assets/js/main-nosidepop.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/nanogallery2@3/dist/jquery.nanogallery2.min.js"></script>

{{--TODO: iparxi nmz to image-gallery kati etsi na ginete etsi link dame--}}
<script>

var photopaths = [];
$('#user-photos').children('.photo').each(function(){

    photopaths.push(  { src: '../assets/images/uploads/' + $(this).attr('img'), srct: '../assets/images/uploads/' + $(this).attr('img')})
})

console.log(photopaths)


$("#gallery").nanogallery2({
  thumbnailHeight:  150,
  thumbnailWidth:   150,
  {{-- "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/", --}}

  thumbnailBorderVertical: 0,
  thumbnailBorderHorizontal: 0,
  thumbnailLabel: {
        position: "overImageOnBottom",
        display: false
    },
  thumbnailHoverEffect2: "imageBlurOn",
  galleryLastRowFull: true,
  thumbnailAlignment: "center",
  breadcrumbOnlyCurrentLevel: false,
  thumbnailOpenImage: false,

  items: photopaths
});
</script>


