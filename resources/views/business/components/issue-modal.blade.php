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
                    {{-- <!-- body here--> --}}
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
