<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{--Toast dependency--}}
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">

</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 col-13">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/"><img src="../assets/images/logo/logo.png" alt="Trapezaki"></a>
                    </div>
                    <h2 class="auth-title text-nowrap">Log in.</h2>


                    <form method="POST" action="/login">
                        @csrf

                        @error('message')
                        <input class="is-invalid text-center" hidden>
                        <div class="invalid-feedback mb-2">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                         @enderror

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>


                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>


                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">

                            {{--TODO: na dume an tha to kratisume to keep me logged in--}}
                            <label class="form-check-label text-gray-600 text-nowrap" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>

                        <button class="btn btn-primary btn-lg shadow-lg mt-4">Log in</button>


                        <div class="col-12 col-md-10 mt-3">
                                    <a>Don't have an account? <a href="/signup">Signup</a></a>
                                    <p><a href="/forgot-password">Forgot my password</a></p>
                        </div>


                    </form>


                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>

{{--Toast dependencies--}}
<script src="assets/vendors/toastify/toastify.js"></script>
<script src="assets/js/extensions/toastify.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

@include("components.toasts");
