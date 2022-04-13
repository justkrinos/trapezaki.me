<div class="d-flex justify-content-center">
<div class="dropdown">
    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="user-menu d-flex">

            <div class="user-name text-end me-3">
                <h6 class="mb-0 text-blue">{{Auth::guard('user1')->user()->username}}&nbsp&nbsp<i class="arrow down" ></i></h6>

            </div>

        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li>
            <a class="dropdown-item bg-light" href="/logout">
                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
</div>
