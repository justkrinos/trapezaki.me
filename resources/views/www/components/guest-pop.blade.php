<form action="#">
    <div class="modal-body">
        @csrf
        <label>Name: </label>
        <div class="form-group">
            <input type="text" placeholder="Your name" class="form-control">
        </div>
        <label>Phone: </label>
        <div class="form-group">
            <input type="text" placeholder="Phone Number" class="form-control">
        </div>
        <label>Email: </label>
        <div class="form-group">
            <input type="text" placeholder="example@example.com" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
            <span class="d-sm-block">Close</span>
        </button>
        <button type="button" id="btnGuest" class="btn btn-primary ml-1">
            <span class="d-sm-block">Continue
                as Guest</span>
        </button>
    </div>
</form>
