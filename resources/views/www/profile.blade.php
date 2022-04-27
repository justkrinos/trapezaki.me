<!DOCTYPE html>
<html lang="en">
<?php
use App\Models\User2;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Profile</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">

    {{-- TODO:  //-prepei na mpei sitemap sto bottom tu page gia na eshi:
                                                        -about us
                                                        -become a partner ston user3 j user2
                                                        -ulla ta links p eshi idi to sidebar
                                                        -copyright @ Trapezaki
                //- to sitemap prp na en responsive mazi me to sidebar
                //- to sitemap ennan ena bar p ena pianni ullo to length
                    but ta contents prp nan justified center me to card
        --}}

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
</head>

<body>
    <div id="app">

        {{-- Include the sidebar from /www/components --}}
        @include('www.components.sidebar')

        <span hidden="true" id="msg">{{ session('success') }}</span>

        <div id="main" class='layout-navbar'>

            {{-- Include the navbar from /www/components --}}
            @include('www.components.navbar')


            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">

                        </div>
                    </div>

                    <div class="container d-flex justify-content-center">
                        <section class="section col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Account info</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row  d-flex justify-content-center">
                                        <div class="col-md-4">
                                            <form method="POST" action="/profile">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="basicInput">Username</label>
                                                    <input type="text"
                                                        value="{{ Auth::guard('user3')->user()->username }}"
                                                        class="form-control" id="username" name="username" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="basicInput">Name</label>
                                                    <small class="text-muted"><i>(First and Last name)</i></small>
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name"
                                                        value="{{ Auth::guard('user3')->user()->full_name }}">
                                                    <div style="color:red">{{ $errors->first('full_name') }}</div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="basicInput">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                        value="{{ Auth::guard('user3')->user()->email }}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="basicInput">Phone number</label>

                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        value="{{ Auth::guard('user3')->user()->phone }}">
                                                    <div style="color:red">{{ $errors->first('phone') }}</div>
                                                </div>

                                                {{-- Hidden id, to show each time which user to update --}}
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="id" name="id"
                                                        value="{{ Auth::guard('user3')->user()->id }}">
                                                </div>

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" name="form1"
                                                        class="btn btn-primary me-1 mb-1">Save Changes</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-4">
                                            <form method="POST" action="/profile" class="col-md-12">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="basicInput">Old Password</label>
                                                    <input type="password" class="form-control form-control-l"
                                                        id="password" name="password" placeholder="Password" required>
                                                    <div style="color:red">{{ $errors->first('password') }}</div>
                                                    @if (session()->has('error'))
                                                        <div>
                                                            <p style="color:red;">{{ session('error') }}</p>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="basicInput">New Password</label>
                                                    <input type="password" class="form-control form-control-l"
                                                        id="new-password" name="new-password" placeholder="Password"
                                                        required>
                                                    <div style="color:red">{{ $errors->first('new-password') }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="basicInput">Re-enter New Password</label>
                                                    <input type="password" class="form-control form-control-l"
                                                        id="new-password_confirmation" name="new-password_confirmation"
                                                        placeholder="Password" required>
                                                    <div style="color:red">
                                                        {{ $errors->first('password_confirmation') }}
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" name="form2"
                                                        class="btn btn-primary me-1 mb-1">Change</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>


        @include('www.components.footer')


</body>

</html>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

{{-- Toast dependencies --}}
<script src="assets/vendors/toastify/toastify.js"></script>
<script src="assets/js/extensions/toastify.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<script src="../assets/js/main-nosidepop.js"></script>


@include('components.toasts')
