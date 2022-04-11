@php
    use App\Models\User2;
@endphp

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

    <!-- Datatable Css Include -->
    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
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
                            <textarea class="form-control" id="details" rows="2" name="details"></textarea>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-start">
                            <input type="submit" class="btn btn-primary" value="Submit Issue" />

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal starts here-->
    <div class="modal fade" id="probModal" tabindex="-1" role="dialog" aria-labelledby="probModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="probModalCenterTitle">Problem Details
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <!-- body here-->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-7">
                                <div class="d-flex input-group col-md-5 mb-4">
                                    <label class="input-group-text" for="issueType">Type</label>
                                    <label type="text" class="form-control" id="issueType">Design
                                        Preference</label>
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="card">
                                <h4 class="card-title" for="issueTextArea">Details</h4>
                                <label class="form-control" id="issueTextArea">The issue
                                    will be
                                    written here and might be a long one but it doenst
                                    matter
                                    because the lines can wrap and the modal can scroll down
                                    as much
                                    as you want so that you can see the details written by
                                    the
                                    business.</label>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <span class="d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>



        <section class="section">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <h3>Previous Problems</h3>
                        <div class="row">
                            <!-- Hoverable rows start -->
                            <section class="section">
                                <div class="row" id="table-hover-row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                </div>
                                                <!-- table hover -->
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0" id="probTable">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>ResNum</th> -->
                                                                <th>Date</th>
                                                                <th>Type</th>
                                                                <th>Status</th>
                                                                <!-- Analogws me ti ena epileksei na tu fkallei to analogo text -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $user2_id = Auth::guard('user2')->user()->id;
                                                            $usernane = User2::find($user2_id)->username;
                                                            ?>
                                                            @foreach (App\Models\Issue::all() as $issue)
                                                                @if ($issue->user2_id == $user2_id)
                                                                    <tr>
                                                                        <td class="date probPopup">
                                                                            {{ $issue->created_at }}
                                                                        </td>
                                                                        <td class="type">{{ $issue->type }}
                                                                        </td>
                                                                        <td>
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
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Hoverable rows end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


<footer>
</footer>


</html>

<!-- Datatable Js Include -->
<script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>


<script src="../assets/js/prev-issues.js"></script>
