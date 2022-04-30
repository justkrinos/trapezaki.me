<!DOCTYPE html>
<html lang="en">

<?php
use App\Models\User2;
use App\Models\Issue;
use App\Models\User2_Photo;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezaki - Issues</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

     {{-- Datatable Css Include --}}
    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/logo/logo_small.png" type="image/x-icon">
</head>

<body>
    <div id="app">

        @include('admin.components.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Issues</h3>
            </div>

            <div class="page-content">

                <div class="col-md-6 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" id="SearchIssue" class="form-control" placeholder="Find Issue"
                            aria-label="Find Issue" aria-describedby="button-addon2">
                    </div>

                    <div class='form-check'>
                        <div class="container">
                            <div class="row col-1">
                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkSolved" class='form-check-input' unchecked>
                                    <label for="checkSolved">Solved</label>
                                </div>

                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkCant" class='form-check-input' unchecked>
                                    <label class="text-nowrap" for="checkCant">Can't be solved</label>
                                </div>

                                <div class="col-sm checkbox">
                                    <input type="checkbox" id="checkNot" class='form-check-input' unchecked>
                                    <label class="text-nowrap" for="checkNot">Pending</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="issueTable" class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                {{-- TODO: na eshi issue type sta columns j na ginete search --}}
                                                <th>Name</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($issues as $issue)
                                                <tr>
                                                    <td class="issueName" class="col-8 issueName">
                                                        {{-- The popup opens with issues.js when class= issueName is cicked --}}
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img src="../assets/images/uploads/{{$issue->user2->logo()}}">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0">
                                                                {{ $issue->user2->business_name }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="issueName" class="col-8 issueName">
                                                        <p class=" mb-0">{{ $issue->created_at }}</p>
                                                    </td>
                                                    {{-- To pass to JQuery --}}
                                                    <td class="issue-description" hidden>{{ $issue->details }}</td>
                                                    <td class="issue-business" hidden>{{ $issue->user2->username }}</td>
                                                    <td class="issue-type" hidden>{{ $issue->type }}</td>
                                                    <td id="status" class="issue-status" hidden>{{ $issue->status }}</td>
                                                    <td class="d-flex flex-nowrap">



                                                        <form action="/issues" method="POST">
                                                            @csrf
                                                            {{-- Hidden ID --}}
                                                            <input type="hidden" id="id" name="id"
                                                                value="{{ $issue->id }}">
                                                            <div class="form-group mb-3" style="width:300px;">
                                                                <button type="submit" name="status" value="1"
                                                                    class="btn btn-outline-success text-nowrap @if($issue->status == '1') active @endif " >Solved</button>

                                                                <button type="submit" name="status" value="2"
                                                                    class="btn btn-outline-danger text-nowrap  @if($issue->status == '2') active @endif">Can't be solved</button>
                                                            </div>
                                                        </form>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @include('admin.components.issue-modal')
        </div>
    </div>
    </div>






    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Trapezaki</p>
            </div>
        </div>
    </footer>
    </div>
    </div>

</body>

</html>


 {{-- Datatable Js Include  --}}
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/issues.js"></script>
