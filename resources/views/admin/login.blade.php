<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Administrator Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
                        <a href="/manage-customers"><img src="../assets/images/logo/logo.png" alt="Trapezaki"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-4">Administrator</p>

                    <form method="POST" action="/login">
                        @csrf

                        @error('message')
                        <input class="is-invalid text-center" hidden>
                        <div class="invalid-feedback">
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


                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>


                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">

                            {{--TODO: na dume an tha to kratisume to keep me logged in--}}
                            <label name="remember_token" class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>

                        <button class="btn btn-primary btn-lg shadow-lg mt-4">Log in</button>


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
@include('components.toasts');
</html>


