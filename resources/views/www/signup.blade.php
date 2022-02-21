<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User 3 signup</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
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
                                    <li class="breadcrumb-item"><a href="/login">Already have an account?</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">Sign up</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form method="POST" action="/signup" class="col-md-6">
                                    {{--To prevent csrf attacks--}}
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control
                                            @error('username') is-invalid @enderror"
                                            id="username" name="username" value="{{ old('username') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('username')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <small class="text-muted"><i>(First and Last name)</i></small>
                                        <input type="text" class="form-control
                                            @error('full_name') is-invalid @enderror"
                                            id="full_name" name="full_name" value="{{ old('full_name') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('full_name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <small class="text-muted">eg.<i>someone@example.com</i></small>
                                        <input type="email" class="form-control
                                            @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input type="phone" class="form-control
                                            @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>


                                    {{--TODO: na fkallei j aman en valid to input --}}
                                    {{--TODO: ta output messages enne ta idia me jina p evalame sta eggrafa, fix them --}}
                                    <div class="form-group">
                                        <label for="password">Create a Password</label>
                                        <input type="password"
                                            class="form-control form-control-l
                                            @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" id="password" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('password')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="password_ver">Re-enter Password</label>
                                        <input type="password" class="form-control form-control-l
                                            @error('password_ver') is-invalid @enderror"
                                            placeholder="Password" name="password_ver" id="password_ver" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('password_ver')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </form>

                                <div class="col-sm-8 d-flex justify-content-end">
                                    <button type="submit" id="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>


                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>


    </div>

    <footer>

    </footer>


    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/register.js"><script>

    <script src="/assets/js/main.js"></script>


</body>
</html>
