<!DOCTYPE html>
<html lang="en">

@php
    use App\Models\User2_Photo;
    use App\Models\User2;
    use App\Models\User2_Tag;
    use App\Models\Tag;

    $user_id = $user2->id;
    $tags = $user2
        ->tags->pluck('name')
        ->toArray();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer</title>

    {{-- Include Choices CSS --}}
    <link rel="stylesheet" href="../assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    {{-- Gia ta tags --}}
    <link rel="stylesheet" href="../assets/css/bootstrap-tagsinput.css" />

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">

    {{-- Photos Ajax Dependencies --}}
    <link rel="stylesheet" href="../assets/css/photo-upload.css">

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="../assets/vendors/toastify/toastify.css">

    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">


</head>

<body>
    <div id="app">

        @include('admin.components.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <h3>Manage Customer</h3>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-16 col-md-6 order-md-1">
                            <div class="col-17">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center conainer">
                                            <div class="avatar avatar-xl">
                                                <img src="../assets/images/uploads/{{ User2_Photo::where('user2_id', $user_id)->where('photo_path', 'like', 'logo%')->get()->first()->photo_path }}"
                                                    alt="logo">
                                            </div>
                                            <div class="ms-3 name container">
                                                <h5 class="font-bold">{{ $user2->business_name }}
                                                </h5>
                                                <h6 class="text-muted mb-0">{{ $user2->company_name }}
                                                </h6>
                                            </div>
                                            <div class="dropdown">
                                                
                                                <button class="btn btn-<?php if ($user2->status == 1) {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'danger';
                                                                        } ?> dropdown-toggle me-1"
                                                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <!-- Tuto na to allassei aftomata o server -->

                                                    <?php if ($user2->status == 1) {
                                                        echo 'Active';
                                                    } else {
                                                        echo 'Disabled';
                                                    } ?>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a id="cust-active" class="dropdown-item" class="active">Active</a>
                                                    <a id="cust-disabled" class="dropdown-item" class="disabled">Disabled</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="/user/{{$user2->username}}" class="col-md-12">
                    @csrf
                    <div class="card">
                        <div class="col-md-5">
                            <input type="hidden" id="id" name="id" class="form-control round"
                                value="{{ $user_id }}">
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4">{{ $user2->description }}</textarea>
                        </div>
                        <div class="card-header">
                            <h6 class="card-title">Business Information</h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control round"
                                        value="{{ $user2->email }}" disabled>
                                        
                                    @if(!$user2->is_verified == 1)
                                        <p style="color:red">Not verified</p>
                                    @endif
                                    
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" class="form-control round"
                                        value="{{ User2::find($user_id)->phone }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <h4 class="card-title">Type</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <div class="checkbox">
                                    @php $type = User2::find($user_id)->type; @endphp
                                    <input name="coffee" type="checkbox" id="checkbox1" class="form-check-input"
                                    @php if (str_contains($type, 'coffee')) {
                                            echo 'checked';
                                        }
                                    @endphp>
                                    <label for="checkbox1">Coffee</label>
                                </div>
                                <div class="checkbox">
                                    <input name="food" type="checkbox" id="checkbox1" class="form-check-input"
                                    @php if (str_contains($type, 'food')) {
                                            echo 'checked';
                                        }
                                    @endphp>
                                    <label for="checkbox1">Food</label>
                                </div>
                                <div class="checkbox">
                                    <input name="drinks" type="checkbox" id="checkbox1" class="form-check-input"
                                    @php if (str_contains($type, 'drinks')) {
                                            echo 'checked';
                                        }
                                    @endphp>
                                    <label for="checkbox1">Drinks</label>
                                </div>
                            </div>
                        </div>


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
                            <!-- Multiple choices end -->
                            <button type="submit" name="form1" class="btn btn-success me-1 mb-1">Save changes</button>
                        </div>

                    </div>

            </div>
            </form>
        <form method="POST" action="/user/{{$user2->username}}" class="col-md-12">
            <section id="input-style">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reservation Management(TODO)</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="roundText">Reservation Range</label>
                                            <input type="text" id="roundText" class="form-control round" value="30">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="squareText">Reservation Duration</label>
                                            <input type="text" id="squareText" class="form-control square" value="2:30">
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="squareText">Last Reservation Hour</label>
                                        <div class="row">
                                            <div class="col-md-3 mb-2">

                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect">
                                                        <option>Monday</option>
                                                        <option>Tuseday</option>
                                                        <option>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option>Friday</option>
                                                        <option>Saturday</option>
                                                        <option>Sunday</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <input type="text" id="squareText" class="form-control square"
                                                    value="21:30">
                                            </div>

                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="squareText">First Reservation Hour</label>
                                        <div class="row">
                                            <div class="col-md-3 mb-2">

                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect">
                                                        <option>Monday</option>
                                                        <option>Tuseday</option>
                                                        <option>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option>Friday</option>
                                                        <option>Saturday</option>
                                                        <option>Sunday</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <input type="text" id="squareText" class="form-control square"
                                                    value="21:30">
                                            </div>

                                        </div>
                                        <button type="submit" name="form2" class="btn btn-success me-1 mb-1">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
            <div class="card">

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
                        <div class="user_id" value="{{ $user_id }}"></div>
                        <ul class="images">
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Menu</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload a menu here</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Floor Plan</h4>
                </div>
                <div class="card-body">
                    <Button id="btnFloorPlan" class="btn btn-primary me-1 mb-1">Open Floor Plan Editor</Button>
                </div>
            </div>


            <div class="card" href="#location">
                <div class="card-header">
                    <h4 class="card-title">Location</h4>
                </div>

                <div class="card-body">
                    <div class="col-md-6 col-12 mb-1">
                        <input type="text" id="location" class="form-control round" name="location">
                    </div>



                    <div class="form-group row">
                        <div class="col-md-6 col-12 mb-2">
                            <div id="map" class="form-control-lg mb-3" style="min-height: 300px;"></div>
                        </div>

                        <div class="col-md-6 col-12">

                            <div class="row flex">
                                <div class="col-sm-2 col-2">
                                    <label class="col-form-label">Lat</label>
                                </div>
                                <div class="col-md-4 col-4">
                                    <input type="text" id="lat" class="form-control" value="" name="lat" disabled>
                                </div>

                                <div class="col-sm-2 col-2">
                                    <label class="col-form-label">Long</label>
                                </div>
                                <div class="col-md-4 col-4">
                                    <input type="text" id="long" class="form-control" value="" name="long" disabled>
                                </div>

                            </div>

                            <div class="col-sm-4">
                                <label class="col-form-label">Address</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="address" class="form-control" name="address" value="">
                            </div>

                            <div class="col-sm-4">
                                <label class="col-form-label text-nowrap">Zip Code</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="zip" class="form-control" name="zip" value="">
                            </div>

                            <div class="col-sm-4">
                                <label class="col-form-label">City</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="city" class="form-control" value="" name="city">
                            </div>

                        </div>

                    </div>



                </div>

            </div>
        </div>

        <footer>
            <button type="submit" class="btn btn-success me-1 mb-1">Save changes</button>
        </footer>


        {{-- Photo Popup Modal --}}
        <div id="photo-popup" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
        </div>
    </div>
    </div>

</body>

</html>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendors/choices.js/choices.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/status-cust.js"></script>

{{-- Maps Api Dependencies --}}
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxUlC2oDfRsgJ7YRBsD9nCicQqBLaDNIE">
</script>
<script type="text/javascript"
src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<script src="../assets/js/maps-script.js"></script>

{{-- For flash messages --}}
<script src="../assets/vendors/toastify/toastify.js"></script>

{{-- Gia ta tags --}}
<script src="../assets/js/typeahead.bundle.js"></script>
<script src="../assets/js/bloodhound.js"></script>
<script src="../assets/js/bootstrap-tagsinput.js"></script>
<script src="../assets/vendors/choices.js/choices.min.js"></script>
<script src="../assets/js/tags.js"></script>

<script type="text/javascript"
src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<script src="../assets/js/maps-script.js"></script>

{{-- Photos Ajax Dependencies --}}
<script src="../assets/js/fileupload.js"></script>

{{-- Include for flash messages --}}
@include('components.toasts')

{{-- Ajax active disable dependency --}}
<script src="../assets/js/active-disable.js"></script>
