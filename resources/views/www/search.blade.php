<!DOCTYPE html>
<html lang="en">

<?php
use App\Models\User2_Photo;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Make a Reservation</title>

    {{-- TODO:
              //-se kathe card tu user2 na eshi j mia photo sta deksia mitsia (tin proti p briskis se sql query)
              //-na valume kamia photo p piso na mennen etsi stegno
              //- to pagination sta datatable en dulefki me ta popup sto user3 js to user2
              //- opou eshi code messe view na mpei mono se controllers
              //-na sastun ta provlimata me to sidebar na megaloni j na men eshi x (en logo tu main.js)

              //-na men to fkallei panta to modal na checkari an eksanaepelekses
              //- na dume pos enna apothikefkete to city, ston user oksa sto session?
              //- pagination
    --}}


    {{-- Toast dependency --}}
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">

    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

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
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="container">
                                <div class="row">

                                    <div class="page-title">
                                        <div class="row">
                                            <div class="col-md-12 mb-1 justify-content-center">

                                                <div class="d-flex justify-content-center mb-5">
                                                    <a class="d-flex justify-content-center">
                                                        <img src="../assets/images/logo/logo_small.png" alt="Trapezaki"
                                                            class="col-md-5 col-5">
                                                    </a>
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



                            {{-- tuto en gia na fkallei recommended magazia prin kamis search --}}
                            @isset($businesses)
                                @include ('www.search.search-results')
                            @else
                                @include('www.search.random')
                            @endif

                            {{--@include('www.components.choose-city')--}}

                            {{-- TODO: na katalaveni an ekames search j na fefki ta exta
                                      magazia j na su fkalli ta search results --}}



                        </div>


                        <footer>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        @include('www.components.footer')


{{-- TODO: na dulefki opos edulefke --}}
        {{-- @if ($showCityPop)
            @include('www.components.choose-city')
        @endif --}}


</body>



<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/date-no-prev.js"></script>

{{-- En xriazete i main dame gt en mono gia to sidebar --}}
<script src="../assets/js/main-nosidepop.js"></script>

{{-- Toast dependencies --}}
<script src="assets/vendors/toastify/toastify.js"></script>
@include('components.toasts')

<script>
    //TODO na mpeoi se js file
    $(document).ready(function() {
        $("#chooseCity").modal('show')
    })

    $(".city-option").click(function() {
        option = $(this).attr("id")
        switch (option) {
            case 'Limassol':
                $("#citySelect").prop('selectedIndex', 0);
                break;
            case 'Paphos':
                $("#citySelect").prop('selectedIndex', 1);
                break;
            case 'Larnaca':
                $("#citySelect").prop('selectedIndex', 2);
                break;
            case 'Nicosia':
                $("#citySelect").prop('selectedIndex', 3);
                break;
            case 'Famagusta':
                $("#citySelect").prop('selectedIndex', 4);
                break;
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('[name="_token"]').attr("value"),
            },
        });

        $.ajax({
            url: "/api/change-city",
            method: "post",
            data: {
                'city': option
            },
            success: function(result) {
                console.log("success")
                console.log(result);
            },
            error: function(error){
                console.log("error")
                console.log(error)
            }
        });
    })
</script>


</html>


{{-- //TODO: otan ginei to search  na apothikefkete kathe fora to city --}}
