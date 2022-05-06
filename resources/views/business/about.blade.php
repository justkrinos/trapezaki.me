<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - About Us</title>
    {{-- //TODO: sto page title na fkenni to logo tu trapezaki --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
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
                <h3>About Us</h3>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="border border-light p-3 mb-4">

                                    <p class="text-xl-center">
                                    We are all very different. We were born in different cities, at different times,
                                    we love different music and we prefer different types of movies. <br>
                                    Despite these, we do have a little something that unites us all. That is our
                                    project, Trapezaki. <br>
                                    We are its heart. We are not just a team, we are a family.<br> <br></p>

                                <div id="app">
                                    <div>
                                        <header class="mb-3">

                                            <!-- Section start -->
                                            <section id="content-types">
                                                <div class="d-flex justify-content-center row">
                                                    <div class="col-xl-2 col-md-4 col-md-5">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <img src="/assets/images/krinos.jpg"
                                                                    class="card-img-top img-fluid">
                                                                <div class="card-body">
                                                                    <h5 class="card-title-center">Krinos Vasileiou</h5>
                                                                </div>
                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">The Project Manager.</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-2 col-md-4 col-md-5">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <img src="/assets/images/andreas.jpg"
                                                                    class="card-img-top img-fluid">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Andreas Efstathiou</h5>
                                                                </div>
                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item"> The King of the backend.
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-2 col-sm-4 col-md-5">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <img src="/assets/images/stefanos.jpg"
                                                                    class="card-img-top img-fluid">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Stefanos Hannadjias</h5>
                                                                </div>
                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">The Marketing Director.</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-2 col-md-4 col-md-5">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <img src="/assets/images/kristia.jpg"
                                                                    class="card-img-top img-fluid">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Kristia Mavrou</h5>
                                                                </div>
                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">The PR Manager.</li>
                                                            </ul>

                                                        </div>


                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Section end -->
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center">
                                This project is developed by a group of third year students of Computer Engineering and
                                Informatics
                                <br>of Cyprus University of Technology, to serve the purposes of the course: CEI-328
                                Software Engineering.
                                <br> Spring Semester, 2022
                            </h5>



                        </div>
                    </div>
                </div>
            </div>



            <footer>

            </footer>
        </div>
    </div>
    @include("business.components.footer")
</body>

</html>


<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/main.js"></script>
