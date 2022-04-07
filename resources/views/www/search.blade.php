<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Make a Reservation</title>

    {{-- TODO: //-na sasei to toast p lalei welcome back
              //-na mpei ena logo kapou kati na fenete to trapezaki
              //-na mpun default user2 prin kami search(exw etoimo view)
              //-se kathe card tu user2 na eshi j mia photo sta deksia mitsia (tin proti p briskis se sql query)
              //-na valume kamia photo p piso na mennen etsi stegno
              //- to pagination sta datatable en dulefki me ta popup sto user3 js to user2
              --}}


    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

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
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="container">
                                <div class="row">

                                    <div class="page-title">
                                        <div class="row">
                                            <div class="col-md-16 mb-1 justify-content-center">
                                                <div class="d-flex justify-content-center mb-5">
                                                    <a href="/" class="d-flex justify-content-center"><img src="../assets/images/logo/logo_small.png"
                                                            alt="Trapezaki" class="col-md-5"></a>
                                                </div>
                                                <h3 class="text-center">Make a Reservation</h3>
                                            </div>
                                            <div class="col-12 col-md-6 order-md-2 order-first">
                                                <nav aria-label="breadcrumb"
                                                    class="breadcrumb-header float-start float-lg-end">
                                                    <ol class="breadcrumb">
                                                        </li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>

                                    @include('www.components.searchbar')
                                </div>
                            </div>


                            <div class="row">

                                <h3>Results</h3>
                                <p class="text-subtitle text-muted">You searched for "bar" </p>
                            </div>


                            @foreach (App\Models\User2::all() as $user)
                                <div class="card">
                                    <div class="row-cols-1">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl me-4">
                                                    <img src="../assets/images/faces/3.jpg">
                                                </div>
                                                <h4 class="card-title text-nowrap">{{ $user->business_name }}</h4>
                                                <div class="container" style="text-align: end;">
                                                    <div class="text-danger">5 chairs left</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex card-body te">
                                            <p class="text-muted">
                                                {{ $user->description }}
                                            </p>
                                            <p class="font-bold">
                                                {{ str_replace(':', ', ', ucfirst($user->type)) }}</p>
                                            <a href="/user/{{ $user->username }}" class="stretched-link"></a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>


                        <footer>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

</body>


<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/date-no-prev.js"></script>

{{-- En xriazete i main dame gt en mono gia to sidebar --}}
<script src="../assets/js/main-nosidepop.js"></script>
@include('components.toasts')

</html>
