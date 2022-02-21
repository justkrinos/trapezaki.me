<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Profile</title>

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

        {{--Include the sidebar from /www/components--}}
        @include('www.components.sidebar')

        <div id="main" class='layout-navbar'>

            {{--Include the navbar from /www/components--}}
            @include('www.components.navbar')

            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">

                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Account info</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="basicInput">Username</label>
                                            <input type="text" value="Giorkos" class="form-control" id="basicInput"
                                                readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">Name</label>
                                            <small class="text-muted"><i>(First and Last name)</i></small>
                                            <input type="text" class="form-control" id="basicInput"
                                                value="Giorgos Charalambous">
                                        </div>


                                        <div class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="text" class="form-control" id="basicInput"
                                                value="ijsij@jsgsgj.com" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">Phone number</label>

                                            <input type="text" class="form-control" id="basicInput" value="99818181">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Change</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="basicInput">Old Password</label>
                                            <input type="password" class="form-control form-control-l"
                                                placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">New Password</label>
                                            <input type="password" class="form-control form-control-l"
                                                placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="basicInput">Re-enter New Password</label>
                                            <input type="password" class="form-control form-control-l"
                                                placeholder="Password">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Change</button>
                                        </div>
                                    </div>
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
<script src="../assets/js/main.js"></script>
