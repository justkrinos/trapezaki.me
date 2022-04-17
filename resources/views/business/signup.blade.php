<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Become an associate</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{-- Gia ta tags --}}
    <link rel="stylesheet" href="/assets/css/bootstrap-tagsinput.css" />

    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">

    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">


    {{-- TODO:
        //-ta tags en dulefkun se mobile
        //-na fiei jino to komma sta tags j en spastiko
        //- to location aman en kami signup j epistrepsei fkallei to sti thalassa
        //- ta tags aman en mitsia kamni overflow to placeholder
     --}}

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
                        @include('components.back-button')
                        <div class="card-header text-center justify-content-center">
                            <h3 class="title">Become an associate</h3>
                            <p class="breadcrumb-item">Already an associate? <a href="/login">Login</a></p>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="/signup" class="" enctype="multipart/form-data">
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
                                {{-- TODO: Tuto itan gia na kamume pio advanced editor alla ennaxume themata me XSS --}}
                                {{-- <div class="col-mb-6 col-12 mb-5">
                                        <div id="snow">
                                            <p>Description goes here. </p>
                                            <p>This is some initial <strong>bold</strong> text</p>
                                            <p><br></p>

                                        </div>
                                        </div> --}}
                                <div class="form-group col-12 justify-content-center mb-5">
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}"
                                        rows=" 4"></textarea>
                                     <div class="invalid-feedback">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>


                                <h5 class="mb-1">File Uploads</h5>
                                <div class="card-body">
                                    <div class="col-md-5 col-12">
                                    {{-- <form action="/api/photo-upload" method="POST" enctype="multipart/form-data">
                                        @csrf --}}
                                        <label for="formFileMultiple" class="form-label">Add
                                            Photos</label>
                                        <input
                                            class="form-control @error('photo') is-invalid @enderror @error('photo.*') is-invalid @enderror"
                                            type="file" id="photo" name="photo[]" multiple>

                                        <div class="invalid-feedback">
                                            @error('photo')
                                                {{ $message }}
                                            @enderror
                                            @error('photo.*')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        {{-- <input class="btn btn-primary" type="submit">
                                    </form> --}}
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group col-md-5 col-12">
                                        <label for="logo" class="form-label">Add Logo</label>
                                        <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                            id="logo" name="logo" required>
                                        @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-body mb-3">
                                    <div class="form-group col-md-5 col-12">
                                        <label for="logo" class="form-label">Add Menu (.pdf)</label>
                                        <input class="form-control @error('menu') is-invalid @enderror" type="file"
                                            id="menu" name="menu" required>
                                        @error('menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <h5 class="mb-4">Location</h5>
                                <div class="col-md-6 col-12 mb-1">
                                    <input type="text" id="location" class="form-control round">
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
                                                <input type="text" id="lat" class="form-control" value="{{old('lat')}}" name="lat"
                                                    readonly>
                                            </div>

                                            <div class="col-sm-2 col-2">
                                                <label class="col-form-label">Long</label>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <input type="text" id="long" class="form-control" value="{{old('lat')}}" name="long"
                                                    readonly>
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
                                            <h6 class="h6">Services</h6>
                                            <div class="form-check" id="type" name="type">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="coffee" name="coffee"
                                                        class="form-check-input" unchecked>
                                                    <label for="coffee">Coffee</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="food" name="food"
                                                        class="form-check-input" unchecked>
                                                    <label for="food">Food</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="drinks" name="drinks"
                                                        class="form-check-input" unchecked>
                                                    <label for="drinks">Drinks</label>
                                                </div>
                                            </div>
                                            <input class="is-invalid" hidden>
                                            @error('food')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
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
                                                                <div class="col-md-7 col-8">
                                                                    @csrf
                                                                    <input name="tags" id="tags" data-role="tagsinput" placeholder="e.g souvlakia, beer, ..."
                                                                        class="@error('tags.*') is-invalid @enderror
                                                                        @error('tags') is-invalid @enderror">

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


<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/register.js"> </script>

{{-- Gia ta tags --}}
<script src="../assets/js/typeahead.bundle.js"></script>
<script src="../assets/js/bloodhound.js"></script>
<script src="../assets/js/bootstrap-tagsinput.js"></script>
<script src="../assets/vendors/choices.js/choices.min.js"></script>
<script src="../assets/js/tags.js"></script>


{{-- Maps Api Dependencies --}}
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxUlC2oDfRsgJ7YRBsD9nCicQqBLaDNIE">
</script>
<script type="text/javascript"
src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<script src="../assets/js/maps-script.js"></script>


<script src="../assets/js/main.js"></script>

</html>
