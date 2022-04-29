            {{-- login form Modal --}}
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="text-center" id="myModalLabel33">Please
                                select an option to continue</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Have an Account</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Continue as
                                        Guest</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form action="#">
                                        @csrf
                                        <div class="modal-body">

                                            <input class="is-invalid text-center" hidden>
                                            <div class="invalid-feedback">
                                                <i id="login-error" class="bx bx-radio-circle"></i>
                                            </div>

                                            <label>Username: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Username or Email" id="username"
                                                    class="form-control">
                                            </div>
                                            <label>Password: </label>
                                            <div class="form-group">
                                                <input type="password" placeholder="Password" id="password"
                                                    class="form-control">
                                            </div>
                                            <p>Don't have an account? <a href="/signup">Signup</a></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <span class="d-sm-block">Close</span>
                                            </button>
                                            <button type="button d-sm-block" id="btnLogin" class="btn btn-primary ml-1">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <form action="#">
                                        @csrf
                                        <div class="modal-body">

                                            <label>Name: </label>
                                            <div class="form-group">
                                                <input type="text" id="full_name" placeholder="Your name"
                                                    class="form-control">
                                                <div class="invalid-feedback">
                                                    <i id="full_name-error" class="bx bx-radio-circle"></i>
                                                </div>
                                            </div>

                                            <label>Phone: </label>
                                            <div class="form-group">
                                                <input type="text" id="phone" placeholder="Phone Number"
                                                    class="form-control">
                                                <div class="invalid-feedback">
                                                    <i id="phone-error" class="bx bx-radio-circle"></i>
                                                </div>
                                            </div>

                                            <label>Email: </label>
                                            <div class="form-group">
                                                <input type="text" id="email" placeholder="example@example.com"
                                                    class="form-control">
                                                <div class="invalid-feedback">
                                                    <i id="email-error" class="bx bx-radio-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <span class="d-sm-block">Close</span>
                                            </button>
                                            <button type="button" id="btnGuest" class="btn btn-primary ml-1">
                                                <span class="d-sm-block">Continue</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>