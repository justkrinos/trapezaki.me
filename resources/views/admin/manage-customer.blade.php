<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">


</head>

<body>
    <div id="app">

        @include('admin.components.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <h3>Manage Customer</h3>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-16 col-md-6 order-md-1">
                            <div class="col-17">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center conainer">
                                            <div class="avatar avatar-xl">
                                                <img src="../assets/images/faces/1.jpg" alt="Face 1">
                                            </div>
                                            <div class="ms-3 name container">
                                                <h5 class="font-bold">Business Name</h5>
                                                <h6 class="text-muted mb-0">Company Name</h6>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <!-- Tuto na to allassei aftomata o server -->
                                                    Active
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a id="cust-active" class="dropdown-item">Active</a>
                                                    <a id="cust-disabled" class="dropdown-item">Disabled</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" id="description" rows="3">Text here</textarea>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Business Information</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control round"
                                    value="letsgoout@letsgohome.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" class="form-control round" value="99818181">
                            </div>
                        </div>
                    </div>

                </div>

                <section id="input-style">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Reservation Management</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="roundText">Reservation Range</label>
                                                <input type="text" id="roundText" class="form-control round" value="30">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="squareText">Reservation Duration</label>
                                                <input type="text" id="squareText" class="form-control square"
                                                    value="2:30">
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <label for="squareText">Last Reservation Hour</label>
                                            <div class="row">
                                                <div class="col-md-3 mb-2">

                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
                                                            <option>Monday</option>
                                                            <option>Tuseday</option>
                                                            <option>Wednesday</option>
                                                            <option>Thursday</option>
                                                            <option>Friday</option>
                                                            <option>Saturday</option>
                                                            <option>Sunday</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-2 mb-1">
                                                    <input type="text" id="squareText" class="form-control square"
                                                        value="21:30">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox1" class="form-check-input" checked>
                                <label for="checkbox1">Coffee</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox1" class="form-check-input" unchecked>
                                <label for="checkbox1">Food</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox1" class="form-check-input" checked>
                                <label for="checkbox1">Drinks</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tags</h4>
                    </div>
                    <div class="card-body">

                        <!-- Multiple choices start -->
                        <section class="multiple-choices">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="row">

                                            <div class="col-md-6 mb-4">

                                                <select class="choices form-select multiple-remove" multiple="multiple">
                                                    <optgroup label="Food">
                                                        <option value="romboid">Souvlakia</option>
                                                        <option value="trapeze" selected>Gyros</option>
                                                        <option value="triangle">Burger</option>
                                                        <option value="polygon">Mezedes</option>
                                                    </optgroup>
                                                    <optgroup label="Tavern">
                                                        <option value="red">Live music</option>
                                                        <option value="green">Mpires</option>
                                                        <option value="blue" selected>Stakes</option>
                                                        <option value="purple">Tsamarella</option>
                                                    </optgroup>
                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Multiple choices end -->

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Photos</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Upload photos here</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload a menu here</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Floor Plan</h4>
                    </div>
                    <div class="card-body">
                        <Button id="btnFloorPlan" class="btn btn-primary me-1 mb-1">Open Floor Plan Editor</Button>
                    </div>
                </div>


                <div class="card" href="#location">
                    <div class="card-header">
                        <h4 class="card-title">Location</h4>
                    </div>

                    <div class="card-body">
                        <div class="col-md-6 col-12 mb-1">
                            <input type="text" id="location" class="form-control round" name="location">
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6 col-12 mb-2">
                                <div id="map" class="form-control-lg mb-3" style="min-height: 300px;"></div>
                            </div>

                            <div class="col-md-6 col-12">

                                <div class="row flex">
                                    <div class="col-sm-2 col-2">
                                        <label class="col-form-label">Lat</label>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <input type="text" id="lat" class="form-control" value="" name="lat"
                                            disabled>
                                    </div>

                                    <div class="col-sm-2 col-2">
                                        <label class="col-form-label">Long</label>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <input type="text" id="long" class="form-control" value="" name="long"
                                            disabled>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label">Address</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="address" class="form-control" name="address" value="">
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label text-nowrap">Zip Code</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="zip" class="form-control" name="zip" value="">
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label">City</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="city" class="form-control" value="" name="city">
                                </div>

                            </div>

                        </div>



                    </div>

                </div>
            </div>

            <footer>
                <button type="submit" class="btn btn-success me-1 mb-1">Save changes</button>
            </footer>
        </div>
    </div>

</body>

</html>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendors/choices.js/choices.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/status-cust.js"></script>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnTnFmCJUu_QEZiPRRReksNQtJuvpl2OQ&libraries=places&callback=initMap">
</script>
<script type="text/javascript"
src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<script src="../assets/js/maps-script.js"></script>
