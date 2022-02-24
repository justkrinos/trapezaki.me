<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Make a Reservation</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="app">

        @include("www.components.sidebar")

        <div id="main" class='layout-navbar'>

            @include("www.components.navbar")

            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="container">
                        <div class="row">

                            <div class="page-title">
                                <div class="row">
                                    <div class="col-md-16 mb-1 justify-content-center">
                                            <h3 class="text-center">Make a Reservation</h3>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <ol class="breadcrumb">
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <section class="section">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control"
                                                placeholder="Find restaurants, bar, cafe..."
                                                aria-describedby="button-addon2">

                                        </div>
                                        <div class="card-content bg-primary">
                                                <div class="row">

                                                    <div class="col-md-4 row-col-4 mb-3">
                                                        <h6 class="text-white">Date</h6>
                                                        <input type="date" id="mydate" class="form-control"
                                                            value="2017-06-01">
                                                    </div>

                                                    <div class="col-md-4 mb-2">
                                                        <h6 class="text-white">Number of people </h6>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect">
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <h6 class="text-white">Category </h6>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect">
                                                                <option>Food </option>
                                                                <option> Drink </option>
                                                                <option> Coffee </option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </div>
                        </div>


                        <div class="row">

                            <h3>Results</h3>
                            <p class="text-subtitle text-muted">You searched for "bar" </p>
                        </div>

                        <div class="card">
                            <div class="row-cols-1">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl me-4">
                                            <img src="../assets/images/faces/3.jpg">
                                        </div>
                                        <h4 class="card-title text-nowrap">Bordello Bar </h4>
                                        <div class="container" style="text-align: end;">
                                            <div class="text-danger">5 chairs left</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex card-body te">
                                    <p class="text-muted">
                                        This is a description where you put a description inside the card that is the
                                        actual description of the business that offers the data that the company
                                        provided for description when they signed up so that will be displayed here and
                                        lets see if it is truncated if its too long
                                    </p>
                                    <p class="font-bold">Coffee, Food, Drinks</p>
                                    <a href="/seven-seas" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="row-cols-1">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl me-4">
                                            <img src="../assets/images/faces/3.jpg">
                                        </div>
                                        <h4 class="card-title text-nowrap">Bordello Bar </h4>
                                        <div class="container" style="text-align: end;">
                                            <div class="text-danger">5 chairs left</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex card-body te">
                                    <p class="text-muted">
                                        This is a description where you put a description inside the card that is the
                                        actual description of the business that offers the data that the company
                                        provided for description when they signed up so that will be displayed here and
                                        lets see if it is truncated if its too long
                                    </p>
                                    <p class="font-bold">Coffee, Food, Drinks</p>
                                    <a href="/seven-seas" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="row-cols-1">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl me-4">
                                            <img src="../assets/images/faces/3.jpg">
                                        </div>
                                        <h4 class="card-title text-nowrap">Bordello Bar </h4>
                                        <div class="container" style="text-align: end;">
                                            <div class="text-danger">5 chairs left</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex card-body te">
                                    <p class="text-muted">
                                        This is a description where you put a description inside the card that is the
                                        actual description of the business that offers the data that the company
                                        provided for description when they signed up so that will be displayed here and
                                        lets see if it is truncated if its too long
                                    </p>
                                    <p class="font-bold">Coffee, Food, Drinks</p>
                                    <a href="/seven-seas" class="stretched-link"></a>
                                </div>
                                <div class="flex card-body te">
                                    <p class="text-muted">
                                        This is a description where you put a description inside the card that is the
                                        actual description of the business that offers the data that the company
                                        provided for description when they signed up so that will be displayed here and
                                        lets see if it is truncated if its too long
                                    </p>
                                    <p class="font-bold">Coffee, Food, Drinks</p>
                                    <a href="/seven-seas" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <footer>
                    </footer>
                </div>
            </div>
        </div>

</body>


<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/vendors/rater-js/rater-js.js"></script>
<script src="../assets/js/extensions/rater-js.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/date-no-prev.js"></script>


</html>
