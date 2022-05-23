<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Signup</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<body>
    <div id="app">

        <div class="page-heading">
            <div class="page-title">

            </div>
        </div>

        <div class="container">
            <section class="section">
                <div class="card ">
                    @include('components.back-button')
                    <div class="card-header text-center justify-content-center">
                        <h3 class="title">Sign up</h3>
                        <div class="breadcrumb-item">Already have an account? <a href="/login">Login</a></div>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <form method="POST" action="/signup" class="col-md-6">
                                {{-- To prevent csrf attacks --}}
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text"
                                        class="form-control
                                            @error('username') is-invalid @enderror"
                                        id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>

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
                                    <input type="text"
                                        class="form-control
                                            @error('full_name') is-invalid @enderror"
                                        id="full_name" name="full_name" placeholder="First name and last name" value="{{ old('full_name') }}" required>

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
                                    <input type="email"
                                        class="form-control
                                            @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

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
                                    <input type="phone"
                                        class="form-control
                                            @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>

                                    {{-- This will be pulled everytime there's an error --}}
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- TODO: na fkallei j aman en valid to input --}}
                                {{-- TODO: ta output messages enne ta idia me jina p evalame sta eggrafa, fix them --}}
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
                                    <label for="password_confirmation">Re-enter Password</label>
                                    <input type="password"
                                        class="form-control form-control-l
                                            @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Password" name="password_confirmation" id="password_confirmation"
                                        required>

                                    {{-- This will be pulled everytime there's an error --}}
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mt-5 d-flex justify-content-end">
                                    <button type="submit" id="submit" class="btn btn-primary me-1 mb-1">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>@include('www.components.footer')
    </div>



    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/register.js"></script>
    <script src="../assets/js/main-noside.js"></script>

</body>

</html>
