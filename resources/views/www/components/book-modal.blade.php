<div class="modal fade" id="resvModal" tabindex="-1" role="dialog" aria-labelledby="resvModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resvModalCenterTitle">Book a Table
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <!-- body here-->
                <div class="card-body container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="input-group">
                                @csrf
                                    <label for="inputSlots">Availability</label>
                                    <div id="inputSlots" class="input-group col-md-5">
                                        <span id="timeSlots" class="form-control row-cols-6"></span>
                                    </div>
                                <div class="col-md-6">
                                    <label for="pax">People</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="people" id="pax">
                                        @if(session('people')) 
                                            <option value="{{session('people')}}" selected>{{session('people')}}</option>
                                        @endif
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="form-group col-12 justify-content-center mb-5">
                                    <label class="mb-2" for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        value="{{ old('description') }}" rows="3"
                                        placeholder="To drink, to eat etc..."></textarea>
                                    <div class="invalid-feedback">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
