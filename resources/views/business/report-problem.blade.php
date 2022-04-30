<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Report a problem</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    {{-- Toast dependency --}}
    <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">

    <!-- Datatable Css Include -->
    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        {{-- Include the sidebar from /business/components --}}
        @include('business.components.sidebar')

    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h3>Report a Problem</h3>

                    <form action="/report-problem" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Type</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="Technical">Technical</option>
                                        <option value="Design Preference">Design Preference</option>
                                        <option value="Change Account Details">Change Account Details</option>
                                        <option value="Change Floor Plan">Change Floor Plan</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <h4 class="card-title" for="details">Details</h4>
                            <textarea class="form-control @error ('description') is-invalid @enderror"
                            id="details" rows="2" name="details" required></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-start">
                            <input type="submit" class="btn btn-primary" value="Submit Issue" />

                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('business.components.issue-modal')

        <section class="section">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <h3>Previous Problems</h3>
                        <div class="row">
                            <section class="section">
                                <div class="row" id="table-hover-row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0" id="probTable">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>ResNum</th> -->
                                                                <th>Date</th>
                                                                <th>Type</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($issues as $issue)
                                                                    <tr>
                                                                        <td class="date probPopup">
                                                                            {{ $issue->created_at }}
                                                                        </td>
                                                                        <td class="type probPopup">{{ $issue->type }}
                                                                        </td>
                                                                        <td class="probPopup">
                                                                            <span
                                                                                class="status"><?php
                                                                                if($issue->status==0) {echo "Pending.";}
                                                                                else if($issue->status==1) {echo "<p style='color:green;'>Solved!</p>";}
                                                                                else if($issue->status==2) {echo "<p style='color:red;'>Cannot be solved...</p>";}
                                                                                ?></span>
                                                                        </td>
                                                                        <td class="problem-description" hidden>
                                                                            {{ $issue->details }}</td>
                                                                        <td class="problem-type" hidden>
                                                                            {{ $issue->type }}</td>
                                                                    </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    @include('business.components.footer')
</body>

<footer>
</footer>


</html>

{{-- <!-- Datatable Js Include --> --}}
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>

{{-- Toast dependencies --}}
<script src="assets/vendors/toastify/toastify.js"></script>
@include('components.toasts')

<script src="assets/js/prev-issues.js"></script>
