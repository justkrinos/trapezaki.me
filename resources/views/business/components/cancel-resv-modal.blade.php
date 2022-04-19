<div class="modal fade text-left" id="confirmModal" tabindex="-1" role="dialog" data-bs-backdrop="false"
    aria-labelledby="myModalLabel19" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title white" id="myModalLabel19">Cancellation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="/manage-reservations" method="POST" id="FormCancel">
            @csrf
            <div class="modal-body">
                <label class="mb-2" for="cancellationReason">Please enter a cancellation reason:</label>
                <div class="form-group col-12 justify-content-center">
                    <textarea class="form-control" name="reason" id="cancellationReason" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                    <span class="d-sm-block">Close</span>
                </button>
                <button type="submit" name="cancelResv" id="submitCancel" class="btn btn-primary ml-1 btn-sm" id="confirmed">
                    <span class="d-sm-block">Submit</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
