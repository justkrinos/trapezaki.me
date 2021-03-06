<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Forgot Password</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">

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

        <div class="container d-flex justify-content-center">
            <div class="col-lg-6 col-10">
                <section class="section">
                    <div class="card ">
                        @include('components.back-button')
                        <div class="card-header text-center justify-content-center">
                            <div class="d-flex justify-content-center mb-5">
                                <a class="d-flex justify-content-center">
                                    <img src="/assets/images/logo/logo_small.png" alt="Trapezaki" class="col-md-5 col-5">
                                </a>
                            </div>
                            <h3 class="title">Forgot Password</h3>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <form method="POST" action="?" class="col-md-6">
                                    {{-- To prevent csrf attacks --}}
                                    @csrf


                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"
                                            class="form-control form-control-l
                                            @error('email') is-invalid @enderror"
                                            placeholder="example@domain.com" name="email" id="email" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="submit" id="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </form>




                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>@include('www.components.footer')
    </div>


</body>

<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/register.js"></script>
<script src="../assets/js/main-noside.js"></script>

{{-- Include for flash messages --}}
<script src="../assets/vendors/toastify/toastify.js"></script>
@include('components.toasts')

</html>
