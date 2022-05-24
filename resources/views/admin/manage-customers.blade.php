<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<html lang="en">

<body>
    <div id="app">

        @include("admin.components.sidebar")

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Manage Customers</h3>
            </div>

            <div class="page-content">
                <div class="col-md-4 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" id="SearchCust" class="form-control" placeholder="Find Businesses"
                            aria-label="Find Businesses" aria-describedby="button-addon2">
                    </div>

                    <div class='form-check'>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkActive" class='form-check-input' unchecked>
                                    <label for="checkActive">Active</label>
                                </div>
                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkDisabled" class='form-check-input' unchecked>
                                    <label for="checkDisabled">Disabled</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="CustTable" class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Member Since</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users2 as $user)
                                            <tr>
                                                <td class="col-8">
                                                    <a href="/user/{{$user->username}}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img src="../assets/images/uploads/{{ $user->logo() }}">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0 text-nowrap">{{ $user->business_name }}</p>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>{{ $user->getDueDateAttribute($user->created_at) }}</td>
                                                <td class="text-center">
                                                    @if($user->status==1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-secondary">Disabled</span>
                                                    @endif
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Trapezaki</p>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/search-cust.js"></script>
</body>

</html>
