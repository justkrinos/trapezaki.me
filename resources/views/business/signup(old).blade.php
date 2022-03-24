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

    <link rel="stylesheet" href="assets/vendors/quill/quill.bubble.css">
    <link rel="stylesheet" href="assets/vendors/quill/quill.snow.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div class="container">
            <header class="mb-3">

            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-2 order-first">

                        </div>
                    </div>
                </div>

                <section class="section d-flex justify-content-center">
                    <div class="card col-md-12 col-12">
                        <div class="card-header text-center justify-content-center">
                            <h3 class="title">Become an associate</h3>
                            <p class="breadcrumb-item">Already an associate? <a href="/login">Login</a></p>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="/signup" class="">
                                {{-- To prevent csrf attacks --}}
                                @csrf

                                <h5 class="mb-3">Account Information</h5>
                                <div class="d-flex row col-md-12 justify-content-center">
                                    <div class="form-group col-md-5 col-12">
                                        <label for="username">Username</label>
                                        <input type="text"
                                            class="form-control
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

                                    <div class="form-group col-md-5 col-12 justify-content-center">
                                        <label for="email">Email</label>
                                        <input type="email"
                                            class="form-control
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
                                </div>


                                <div class="d-flex row col-md-12 mb-4 justify-content-center">
                                    <div class="form-group col-md-5 col-12">
                                        <label for="password">Create a Password</label>
                                        <input type="password"
                                            class="form-control form-control-l
                                                @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" id="password" required>

                                        @error('password')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-5 col-12 justify-content-center">
                                        <label for="password_confirmation">Re-enter Password</label>
                                        <input type="password"
                                            class="form-control form-control-l
                                                @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Password" name="password_confirmation"
                                            id="password_confirmation" required>

                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>

                                <h5 class="mb-4">Business Information</h5>

                                <div class="d-flex row col-md-12 mb-4 justify-content-center">
                                    <div class="form-group col-md-5 col-12">
                                        <label for="business_name">Business Name</label>
                                        <input type="text"
                                            class="form-control
                                            @error('business_name') is-invalid @enderror"
                                            placeholder="Business Name" id="business_name" name="business_name"
                                            value="{{ old('business_name') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('business_name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5 col-12 justify-content-center">
                                        <label for="company_name">Company Name</label>
                                        <input type="text"
                                            class="form-control
                                            @error('company_name') is-invalid @enderror"
                                            placeholder="Company Name" id="company_name" name="company_name"
                                            value="{{ old('company_name') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('company_name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5 col-12 justify-content-center">
                                        <label for="representative">Representative Name</label>
                                        <input type="text"
                                            class="form-control
                                            @error('representative') is-invalid @enderror"
                                            placeholder="Representative Name" id="representative" name="representative"
                                            value="{{ old('representative') }}" required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('representative')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-5 col-12 justify-content-center">
                                        <label for="phone">Phone number</label>
                                        <input type="phone"
                                            class="form-control
                                                    @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}"
                                            required>

                                        {{-- This will be pulled everytime there's an error --}}
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>


                                <h5 class="h6 mb-2">Description</h5>
                                {{-- Tuto itan gia na kamume pio advanced editor alla ennaxume themata me XSS --}}
                                {{-- <div class="col-mb-6 col-12 mb-5">
                                        <div id="snow">
                                            <p>Description goes here. </p>
                                            <p>This is some initial <strong>bold</strong> text</p>
                                            <p><br></p>

                                        </div>
                                        </div> --}}
                                <div class="form-group col-12 justify-content-center mb-5">
                                    <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"
                                        rows=" 4"></textarea>
                                </div>


                                <h5 class="mb-1">File Uploads</h5>
                                <div class="card-body">
                                    <div class="col-md-5 col-12">
                                        <label for="formFileMultiple" class="form-label">Add
                                            Photos</label>
                                        <input class="form-control" type="file" id="photo" name="photo" multiple>
                                    </div>
                                </div>

                                <div class="card-body mb-3">
                                    <div class="form-group col-md-5 col-12">
                                        <label for="logo" class="form-label">Add Logo</label>
                                        <input class="form-control" type="file" id="logo" name="logo" required>
                                        @error('logo')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <h5 class="mb-4">Location</h5>
                                <div class="col-md-6 col-12 mb-1">
                                    <input type="text" id="location" class="form-control round" name="location">
                                </div>



                                <div class="form-group row mb-5">
                                    <div class="col-md-6 col-12 mb-2">
                                        <div id="map" class="form-control-lg mb-3" style="min-height: 300px;"></div>
                                    </div>

                                    <div class="col-md-6 col-12">

                                        <div class="row flex">
                                            <div class="col-sm-2 col-2">
                                                <label class="col-form-label">Lat</label>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <input type="text" id="lat" class="form-control" value="" name="lat"
                                                    disabled>
                                            </div>

                                            <div class="col-sm-2 col-2">
                                                <label class="col-form-label">Long</label>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <input type="text" id="long" class="form-control" value="" name="long"
                                                    disabled>
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-form-label">Address</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" id="address"
                                                class="form-control @error('city') is-invalid @enderror" name="address"
                                                value="{{ old('postal') }}">
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-form-label text-nowrap">Zip
                                                Code</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" id="zip"
                                                class="form-control @error('city') is-invalid @enderror" name="postal"
                                                value="{{ old('postal') }}" required>

                                            @error('postal')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="col-form-label">City</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text"
                                                class="form-control
                                                                @error('city') is-invalid @enderror"
                                                placeholder="City" id="city" name="city" value="{{ old('city') }}"
                                                required>

                                            @error('city')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>
                                </div>


                                <h5 class="mb-4">Business Characteristics</h5>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12">

                                        <div class="card-body">
                                            <h6 class="h6">Type</h6>
                                            <div class="form-check" id="type" name="type">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="coffee" name="type"
                                                        class="form-check-input" unchecked>
                                                    <label for="checkbox1">Coffee</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="food" name="type"
                                                        class="form-check-input" unchecked>
                                                    <label for="checkbox1">Food</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="drinks" name="type"
                                                        class="form-check-input" unchecked>
                                                    <label for="checkbox1">Drinks</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-header">
                                            <h6 class="h6">Tags</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Multiple choices start -->
                                            <section class="multiple-choices" id="tags" name="tags">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="row">

                                                                <div class="col-md-12">

                                                                    <select class="choices form-select multiple-remove"
                                                                        multiple="multiple">
                                                                        <optgroup label="Food">
                                                                            <option value="souvlakia">
                                                                                Souvlakia</option>
                                                                            <option value="gyros" selected>
                                                                                Gyros</option>
                                                                            <option value="burher">Burger
                                                                            </option>
                                                                            <option value="mezedes">Mezedes
                                                                            </option>
                                                                        </optgroup>
                                                                        <optgroup label="Tavern">
                                                                            <option value="live">Live music
                                                                            </option>
                                                                            <option value="mpires">Mpires
                                                                            </option>
                                                                            <option value="stakes" selected>
                                                                                Stakes</option>
                                                                            <option value="tsamarella">
                                                                                Tsamarella</option>
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
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="submit" class="btn btn-primary btn-lg me-3 mb-1">Sign
                                        Up</button>
                                </div>

                            </form>
                        </div>

                    </div>

            </div>
        </div>
    </div>


</body>


<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/register.js"> </script>
<script src="../assets/vendors/choices.js/choices.min.js"></script>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

{{-- Maps Api Dependencies --}}
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnTnFmCJUu_QEZiPRRReksNQtJuvpl2OQ&libraries=places&callback=initMap">
</script>
<script type="text/javascript"
src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<script src="../assets/js/maps-script.js"></script>

<script src="assets/vendors/quill/quill.min.js"></script>
<script src="assets/js/pages/form-editor.js"></script>
<script src="../assets/js/main.js"></script>
@include('components.toasts');


</html>
