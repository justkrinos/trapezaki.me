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

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
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
                                    <li class="breadcrumb-item"><a href="/">Already have an account?</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Input</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Become an associate</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <form method="POST" action="/signup" class="col-md-10">
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

                                        <h4 class="card-title">Business Information</h4>

                                        <div class="form-group">

                                            <input type="text" class="form-control
                                            @error('business_name') is-invalid @enderror" placeholder="Business Name"
                                            id="business_name" name="business_name" value="{{ old('business_name') }}" required
                                            <p><small class="text-muted">*Enter business name</small> 
                                            </p>

                                            {{-- This will be pulled everytime there's an error --}}
                                            @error('business_name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                            @enderror

                                            <input type="text" class="form-control
                                            @error('company_name') is-invalid @enderror" placeholder="Company Name"
                                            id="company_name" name="company_name" value="{{ old('company_name') }}" required
                                            <p><small class="text-muted">*Enter company name</small> 
                                            </p>

                                            {{-- This will be pulled everytime there's an error --}}
                                            @error('company_name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                            @enderror

                                            <input type="text" class="form-control
                                            @error('representative_name') is-invalid @enderror" placeholder="Representative Name"
                                            id="representative_name" name="representative_name" value="{{ old('representative_name') }}" required
                                            <p><small class="text-muted">*Enter representative name</small> 
                                            </p>

                                            {{-- This will be pulled everytime there's an error --}}
                                            @error('representative_name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                            @enderror

                                            <input type="text" class="form-control
                                            @error('city') is-invalid @enderror" placeholder="City"
                                            id="city" name="city" value="{{ old('city') }}" required
                                            <p><small class="text-muted">*Enter business location city</small> 
                                            </p>

                                            {{-- This will be pulled everytime there's an error --}}
                                            @error('city')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                            @enderror

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

                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="description" class="form-label">
                                                        Description</label>
                                                    <textarea class="form-control" id="description" name="description" 
                                                        value="{{ old('description') }}""
                                                        rows="4"></textarea>
                                                </div>
                                            </div>
                                            <!--end of description-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="formFileMultiple" class="form-label">Add Photos</label>
                                                        <input class="form-control" type="file" id="photo" name="photo" value="{{ old('photo') }}"
                                                            multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Add Logo</label>
                                                        <input class="form-control" type="file" id="logo" name="logo" value="{{ old('logo') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Choose Location</h4>
                                                </div>
                                                <div class="card-body">
                                                    <iframe src="https://maps.google.com/maps?q=CUT%20cyprus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;"id="location" name="location" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <section class="section">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Choose Type</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check" id="type" name="type">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="coffee" name="coffee" class="form-check-input"
                                                                    checked>
                                                                <label for="checkbox1">Coffee</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="food" name="food" class="form-check-input"
                                                                    unchecked>
                                                                <label for="checkbox1">Food</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="drinks" name="drinks" class="form-check-input"
                                                                    checked>
                                                                <label for="checkbox1">Drinks</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Select Tags</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- Multiple choices start -->
                                            <section class="multiple-choices" id="tags" name="tags">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                                    <div class="row">

                                                                        <div class="col-md-18 mb-4">

                                                                                <select class="choices form-select multiple-remove"
                                                                                    multiple="multiple">
                                                                                    <optgroup label="Food">
                                                                                        <option value="souvlakia">Souvlakia</option>
                                                                                        <option value="gyros" selected>Gyros</option>
                                                                                        <option value="burher">Burger</option>
                                                                                        <option value="mezedes">Mezedes</option>
                                                                                    </optgroup>
                                                                                    <optgroup label="Tavern">
                                                                                        <option value="live">Live music</option>
                                                                                        <option value="mpires">Mpires</option>
                                                                                        <option value="stakes" selected>Stakes</option>
                                                                                        <option value="tsamarella">Tsamarella</option>
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
                                    </form>
                                </div>
                                </div>
                            <div class="col-sm-8 d-flex justify-content-end">
                                <button type="submit" id="submit"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                    </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </section>



            </div>

            <footer>

            </footer>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/register.js"><script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/vendors/choices.js/choices.min.js"></script>


</body>

</html>
