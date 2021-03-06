<div class="modal fade" id="resvModal" tabindex="-1" role="dialog" aria-labelledby="issueModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="issueModalCenterTitle">Reservation Details
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div id="modalContent" class="row">
                        <div class="col-sm-7">
                            <div class="flex-nowrap input-group col-md-5 mb-4">
                                <label class="input-group-text" for="issueBusiness">Status</label>
                                <label id="status" class="d-flex form-control justify-content-begin align-items-center">
                                    @include('business.components.circle-icon')&nbsp;
                                    <div id="statusText" class="text-secondary">Canceled</div>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="flex-nowrap input-group col-md-5 mb-4">
                                <label class="input-group-text" for="myresvBusiness">Reservation No.</label>
                                <label type="text" class="form-control" id="myresvBusiness"></label>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="flex-nowrap input-group col-md-5 mb-4">
                                <label class="input-group-text" for="customerName">Name</label>
                                <label type="text" class="form-control" id="customerName"></label>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="flex-nowrap input-group col-md-5 mb-4">
                                <label class="input-group-text" for="phone">Phone
                                    Number</label>
                                <label type="text" class="form-control" id="phone"></label>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="d-flex input-group col-md-3 mb-3">
                                <label class="input-group-text" for="myresvType">Table</label>
                                <div class="col-4">
                                    <label type="text" class="form-control" id="myresvType"></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-1">
                            <div class="input-group mb-3">
                                <span class="input-group-text">People</span>
                                <div class="col-4">
                                    <input type="number" id="attendance" min="0" max="16" class="form-control"
                                        value="0">
                                </div>
                                <span class="input-group-text" id="people">/4</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="col-md-4 mb-4">
                                <div class="input-group mb-4">
                                    <label class="input-group-text" for="myresvTime">Time</label>
                                    <label type="text" class="form-control" id="myresvTime"></label>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <h6 class="" for="issueTextArea">Description</h6>
                            <label class="form-control" id="myresvTextArea"></label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-start">
                <div class="d-flex col-12">

                    <div class="col-5">
                        <button type="button" id="modResv" class="btn btn-light-secondary">
                            <span class="d-block d-sm-block">Modify</span>
                        </button>
                        <button type="button" id="modCancel" class="btn btn-light-secondary">
                            <span class="d-block d-sm-block">Cancel</span>
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
