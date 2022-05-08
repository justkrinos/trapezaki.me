<!DOCTYPE html>
<html lang="en">
<?php
use App\Models\User2;
use App\Models\User2_Tag;
use App\Models\Tag;
use App\Models\User2_Photo;
use App\Models\Daily_Setting;




?>

{{-- TODO: ta business info j jina nan pio wraia --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Profile</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">

    {{-- Gia ta tags --}}
    <link rel="stylesheet" href="/assets/css/bootstrap-tagsinput.css" />

    {{-- Photos Ajax Dependencies --}}
    <link rel="stylesheet" href="/assets/css/photo-upload.css">

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">

</head>


<body>
    <div id="app">
        {{-- Include the sidebar from /business/components --}}
        @include('business.components.sidebar')



        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <h3>Profile</h3>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <div class="col-10">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center conainer">
                                            <div class="avatar avatar-xl">

                                                <img src="../assets/images/uploads/{{ Auth::guard('user2')->user()->logo() }}"
                                                    alt="logo">
                                            </div>
                                            <div class="ms-3 name container">
                                                <h5 class="font-bold">
                                                    {{ Auth::guard('user2')->user()->business_name }}</h5>
                                                <h6 class="text-muted mb-0">
                                                    {{ Auth::guard('user2')->user()->company_name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="POST" action="/profile#detailsCard" class="col-md-12">
                    @csrf
                    <div class="card" id="detailsCard">
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                        </div>
                        <div class="form-group col-12 justify-content-center mb-5">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4">{{ Auth::guard('user2')->user()->description }}</textarea>
                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="card-header">
                            <h6 class="card-title">Business Information</h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control round"
                                        value="{{ Auth::guard('user2')->user()->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" class="form-control round"
                                        value="{{ Auth::guard('user2')->user()->phone }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="phone">Work Number</label>
                                    <input type="text" id="phone" class="form-control round"
                                        value="{{ Auth::guard('user2')->user()->phone }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="representative">Representative</label>
                                    <input type="text" name="representative" class="form-control round @error ('representative') is-invalid  @enderror"
                                        value="{{ Auth::guard('user2')->user()->representative }}">
                                    @error('representative')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-header">
                                <h4 class="card-title">Services</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input name="coffee" type="checkbox" id="checkbox1" class="form-check-input"
                                            @if (str_contains(Auth::guard('user2')->user()->type, 'coffee')) {
                                                checked @endif>
                                        <label for="checkbox1">Coffee</label>

                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="food" id="checkbox1" class="form-check-input"
                                            @if (str_contains(Auth::guard('user2')->user()->type, 'food')) checked @endif>
                                        <label for="checkbox1">Food</label>
                                    </div>
                                    <div class="checkbox">
                                        <input name="drinks" type="checkbox" id="checkbox1" class="form-check-input"
                                            @if (str_contains(Auth::guard('user2')->user()->type, 'drinks')) checked @endif>
                                        <label for="checkbox1">Drinks</label>
                                    </div>
                                    @error('coffee')
                                        @php
                                            $message = "*You must select at least 1 of the types of service.";
                                        @endphp
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card-header">
                                    <h6 class="h6">Tags</h6>
                                </div>
                                <div class="card-body">
                                    <section class="multiple-choices">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            @csrf
                                                            <input name="tags" id="tags" data-role="tagsinput"
                                                                class="@error('tags.*') is-invalid @enderror
                                                                            @error('tags') is-invalid @enderror"
                                                                value="{{ implode(', ', $tags) }}">

                                                            <div class="invalid-feedback">
                                                                <i class="bx bx-radio-circle"></i>
                                                                @error('tags.*')
                                                                    {{ $message }}
                                                                @enderror
                                                                @error('tags')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <button type="submit" name="detailsForm" class="btn btn-success me-1 mb-1">Save changes</button>
                        </div>
                    </div>
                </form>

                <section id="input-style">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Reservation Management</h4>
                                </div>
                                <form method="POST" action="/profile" class="col-md-12 ">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="roundText">Reservation Range</label>
                                                    <input type="text" id="roundText" class="form-control round"
                                                        value="{{ Auth::guard('user2')->user()->res_range }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="squareText">Reservation Duration</label>
                                                    <input type="text" id="squareText" class="form-control square"
                                                        value="{{ Auth::guard('user2')->user()->duration }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex col-12 mb-2">
                                            <div class="form-group col-5 me-2">
                                                <label for="basicSelect">Day</label>
                                                <fieldset id="first" class="form-group">
                                                    <select class="form-select" id="basicSelect" name="first">
                                                        <option>Monday</option>
                                                        <option>Tuesday</option>
                                                        <option>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option>Friday</option>
                                                        <option>Saturday</option>
                                                        <option>Sunday</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div>

                                                <div class="row">
                                                    <label for="basicSelect">First Reservation Hour</label>
                                                    <div class="col-md-2 mb-1">
                                                        <input type="text" id="firstResv" class="form-control square"
                                                            value="{{ $min }}" disabled>
                                                    </div>
                                                    <label for="basicSelect">Last Reservation Hour</label>
                                                    <div class="col-md-2 mb-1">
                                                        <input type="text" id="lastResv" class="form-control square"
                                                            value="{{ $max }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Photos</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        @csrf
                        <label for="formFileMultiple" class="form-label">Upload photos here</label>
                        <form id="image-upload-form">
                            <input class="form-control" type="file" id="upload_photo">
                            <div class="invalid-feedback">
                                <i id="upload-photo-error" class="bx bx-radio-circle"></i>
                            </div>

                        </form>
                        <div id="fileupload" class="mb-3"></div>
                        <div class="user_id" value="{{ Auth::guard('user2')->user()->id }}"></div>
                        <ul class="images"></ul>
                    </div>
                </div>
            </div>

            <div class="card" id="menuForm">
                <div class="card-header">
                    <h4 class="card-title">Menu</h4>
                </div>
                <form method="POST" action="/profile/menu#menuForm" class="col-md-12 " enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload a menu here</label>
                            <input class="form-control @error('menu') is-invalid @enderror" type="file" id="menu"
                                name="menu" id="formFile">
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('menu')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <a href="/profile/menu" name="menuForm" class="btn btn-info me-1 mb-1" target="_blank">Open</a>
                        <button type="submit" name="menuForm" class="btn btn-success me-1 mb-1">Upload new</button>
                    </div>
                </form>
            </div>


            <!-- Location Card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Location</h4>
                </div>
                <div class="card-body">
                    <iframe
                        src="https://maps.google.com/maps?q={{ Auth::guard('user2')->user()->lat }},{{ Auth::guard('user2')->user()->long }}&hl=es;z=14&amp;output=embed"
                        frameborder="0" style="border:0; width: 100%; height: 290px;" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="card" id="passwordCard">
                <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="/profile#passwordCard" class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <label for="basicInput">Old Password</label>
                                    <input type="password" class="form-control form-control-l
                                        @error('password')@enderror
                                        @if(Session::has('password')) is-invalid @endif" id="password"
                                        name="password" placeholder="Password" required>
                                    @if(Session::has('password'))
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ Session::get('password') }}
                                            </div>
                                    @endif
                                    @error('password')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">New Password</label>
                                    <input type="password" class="form-control form-control-l @error('new-password') is-invalid @enderror" id="new-password"
                                        name="new-password" placeholder="Password" required>
                                    @error('new-password')
                                        <div class="invalid-feedback">
                                           <i class="bx bx-radio-circle"></i>
                                           {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Re-enter New Password</label>
                                    <input type="password" class="form-control form-control-l @error('new-password_confirmation') is-invalid @enderror"
                                        id="new-password_confirmation" name="new-password_confirmation"
                                        placeholder="Password" required>
                                    @error('new-password_confirmation')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>

                                {{-- Hidden id, to show each time which user to update --}}
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="{{ Auth::guard('user2')->user()->id }}">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="username" name="username"
                                        value="{{ Auth::guard('user2')->user()->username }}">
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" name="passwordForm"
                                        class="btn btn-primary me-1 mb-1">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Photo Popup Modal --}}
    <div id="photo-popup" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    @include('business.components.footer')
</body>

</html>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

{{-- Gia ta tags --}}
<script src="/assets/js/typeahead.bundle.js"></script>
<script src="/assets/js/bloodhound.js"></script>
<script src="/assets/js/bootstrap-tagsinput.js"></script>
<script src="/assets/vendors/choices.js/choices.min.js"></script>
<script src="/assets/js/tags.js"></script>

{{-- For flash messages --}}
<script src="/assets/vendors/toastify/toastify.js"></script>

<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendors/choices.js/choices.min.js"></script>

{{-- Photos Ajax Dependencies --}}
<script src="/assets/js/fileupload.js"></script>

<script src="../assets/js/main.js"></script>

{{-- Include for flash messages --}}
@include('components.toasts')

{{-- TODO: na mpi se diko tu file --}}
<script>
    //Ajax call for reservation settings(switch between days)

    $(document).ready(function() {
        $("#first").change(function() {
            var day = $("#first").find(":selected").text();
            console.log(day);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/profile",
                data: {
                    "day": day,
                    "first": 1
                },
                success: function(data) {
                    console.log(data[0]);
                    $("#firstResv").val(data[0]);
                    $("#lastResv").val(data[1]);
                }
            });
        });
    });
</script>
