<div class="modal fade" id="resvModal" tabindex="-1" role="dialog" aria-labelledby="resvModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="tabs active" id="tab01">
                    <h5 class="modal-title" id="resvModalCenterTitle">Existing User
                    </h5>
                </div>
                <div class="tabs" id="tab02">
                    <h5 class="modal-title text-muted" id="resvModalCenterTitle">Guest
                    </h5>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <!-- body here-->
                <fieldset class="show" id="tab011">
                    <div class="card-body container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="input-group">
                                    @csrf
                                    <label for="user3_username">Username</label>
                                    <div id="user3" class="input-group col-md-5">
                                        <input type="text" id="user3_username" class="form-control row-cols-6">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <label for="inputSlots">Availabiliy</label>
                                    <div id="inputSlots" class="input-group col-md-5">
                                        <span id="timeSlots" class="form-control"></span>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <label class="mb-2" for="description">Description</label>
                                    <div class="form-group col-12 justify-content-center mb-5">
                                        <textarea class="form-control" id="description" name="description"
                                             rows="3" placeholder="To drink, to eat etc..."></textarea>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset id="tab021">
                    <div class="card-body container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="input-group">
                                    @csrf
                                    <label for="guest_fullname">Name</label>
                                    <div class="input-group col-md-5">
                                        <input type="text" name="full_name" id="fullname" class="form-control row-cols-6">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <label for="guest_phone">Phone</label>
                                    <div class="input-group col-md-5">
                                        <input type="text" name="phone" id="phone" class="form-control row-cols-6">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <label for="guest_email">Email</label>
                                    <div class="input-group col-md-5">
                                        <input type="text" name="email" id="email" class="form-control row-cols-6">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <label for="inputSlots">Availabiliy</label>
                                    <div id="inputSlots" class="input-group col-md-5">
                                        <span id="timeSlots2" class="form-control"></span>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <label class="mb-2" for="description">Description</label>
                                    <div class="form-group col-12 justify-content-center mb-5">
                                        <textarea class="form-control" id="description_guest" name="description"
                                         rows="3" placeholder="To drink, to eat etc..."></textarea>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

            </div>
            <div class="modal-footer">
                <span id="btnBook"></span>
                <button class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <span class="d-sm-block" id="closeResvModal">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>


