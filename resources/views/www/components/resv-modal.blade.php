{{-- <!-- Reservation modal starts here--> --}}
<div class="modal fade" id="myresvModal" tabindex="-1" role="dialog" aria-labelledby="myresvModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myresvModalCenterTitle">Reservation Details
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x
                </button>
            </div>
            <div class="modal-body">
                {{-- <!-- body here--> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="flex-nowrap input-group col-md-5 mb-4">
                                <label class="input-group-text" for="myresvNumber">Reservation
                                    No.</label>
                                <label type="text" class="form-control" id="myresvNumber"></label>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="d-flex input-group col-md-3 mb-3">
                                <label class="input-group-text" for="myresvTable">Table</label>
                                <div class="col-4">
                                    <label type="text" class="form-control" id="myresvTable">4</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-1">
                            <div class="input-group mb-3 col-md-3">
                                <label class="input-group-text" for="myresvPeople">People</label>
                                <div class="col-4">
                                    <label type="text" class="form-control col-3" id="myresvPeople">4</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="col-md-4 mb-4">
                                <div class="input-group mb-4">
                                    <label class="input-group-text" for="myresvTime">Time</label>
                                    <label type="text" class="form-control" id="myresvTime">18:00</label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="card">
                            <h6 class="" for="myresvDetails">Details</h6>
                            <label class="form-control" id="myresvDetails">The description
                                will be
                                written here and might be a long one but it doenst matter
                                because the lines can wrap and the modal can scroll down as
                                much
                                as you want so that you can see the details written by the
                                customer.</label>
                        </div>
                        <div class="card" id="cancelReasonCard">
                            <h6 class="" for="myresvCancelReason">Cancellation Reason</h6>
                            <label class="form-control" id="myresvCancelReason"></label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-start">
                <div class="d-flex col-12">

                    <div class="col-5">
                        <button type="button" id="modCancel" class="btn btn-light-secondary">
                            <span class="d-block d-sm-block">Cancel Reservation</span>
                        </button>
                    </div>

                    <div class="d-flex justify-content-end col-7">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="d-block d-sm-block">Close</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <!-- Reservation Modal Ends Here--> --}}
