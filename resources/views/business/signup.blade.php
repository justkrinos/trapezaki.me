<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Become an associate</title>

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
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Already have an account?</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Input</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Become an associate</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="basicInput">Username</label>
                                        <input type="text" class="form-control" id="basicInput">
                                    </div>

                                    <div class="form-group">
                                        <label for="basicInput">Email</label>
                                        <small class="text-muted">eg.<i>someone@example.com</i></small>
                                        <input type="text" class="form-control" id="basicInput">
                                    </div>



                                    <div class="form-group">
                                        <label for="helpInputTop">Create a Password</label>
                                        <input type="password" class="form-control form-control-l" placeholder="Password">
                                        <div class="form-control-icon">
                                            <i class="bi bi-shield-lock"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Re-enter Password</label>
                                        <input type="password" class="form-control form-control-l" placeholder="Password">
                                    </div>

                                    <h4 class="card-title">Business Information</h4>

                                    <div class="form-group">

                                        <input type="text" id="helperText" class="form-control" placeholder="Business Name">
                                        <p><small class="text-muted">*Enter business name</small>
                                        </p>

                                        <input type="text" id="helperText" class="form-control" placeholder="Company Name">
                                        <p><small class="text-muted">*Enter company name</small>
                                        </p>

                                        <input type="text" id="helperText" class="form-control" placeholder="Representative Name">
                                        <p><small class="text-muted">*Enter representative name</small>
                                        </p>

                                        <input type="text" id="helperText" class="form-control" placeholder="City">
                                        <p><small class="text-muted">*Enter business location city</small>
                                        </p>

                                        <input type="text" id="helperText" class="form-control" placeholder="Phone number">
                                        <p><small class="text-muted">*Enter owner's phone number</small>
                                        </p>

                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">
                                                    Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="4"></textarea>
                                            </div>
                                        </div>
                                        <!--end of description-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="formFileMultiple" class="form-label">Add Photos</label>
                                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Add Logo</label>
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Choose Location</h4>
                                            </div>
                                            <div class="card-body">
                                                <iframe src="https://maps.google.com/maps?q=CUT%20cyprus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <section class="section">

                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Choose Type</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" class="form-check-input"
                                                                checked>
                                                            <label for="checkbox1">Coffee</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" class="form-check-input"
                                                                unchecked>
                                                            <label for="checkbox1">Food</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" class="form-check-input"
                                                                checked>
                                                            <label for="checkbox1">Drinks</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Select Tags</h5>
                                                </div>
                                                <div class="card-body">
                                                      <!-- Multiple choices start -->
                                        <section class="multiple-choices">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                                <div class="row">

                                                                    <div class="col-md-18 mb-4">

                                                                            <select class="choices form-select multiple-remove"
                                                                                multiple="multiple">
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
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset"
                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </section>



            </div>

            <footer>

            </footer>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/main.js"></script>

    <script src="../assets/vendors/choices.js/choices.min.js"></script>

    <script src="../assets/js/main.js"></script>


</body>

</html>
