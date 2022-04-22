<div class="modal fade" id="resvModal" tabindex="-1" role="dialog" aria-labelledby="resvModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resvModalCenterTitle">Modify Reservation
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="input-group">
                                @csrf

                                <input type="number" id="reservation_id" value="{{ $reservation->id }}" hidden>
                                <input type="number" id="table_id" value="{{$reservation->table->id}}" hidden>
                                <input type="date" id="old-date" value="{{$reservation->date}}" hidden>

                                <div class="col-12 mb-2">
                                    <label for="username">Username</label>
                                    <div id="user3" class="input-group col-md-5">
                                        <input type="text" id="user3_username" class="form-control row-cols-6"
                                            value="{{ $user3->username }}" disabled>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7 me-2">
                                    <label for="fullname">Name</label>
                                    <div class="col-sm-11 mb-2">
                                        <input type="text" name="full_name" id="fullname"
                                            class="form-control row-cols-6" value="{{ $user3->full_name }}" disabled>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 me-3">
                                    <label for="phone">Phone</label>
                                    <div class="input-group col-md-12">
                                        <input type="text" name="phone" id="phone" class="form-control row-cols-6"
                                            value="{{ $user3->phone }}" disabled>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 me-3">
                                    <label for="table" class="text-nowrap">Table</label>
                                    <div class="col-md-12">
                                        <input type="text" name="table" id="table" class="form-control row-cols-6"
                                            value="{{ $reservation->table->table_no }}" disabled>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 me-3">
                                    <label for="people">People</label>
                                    <div class="col-md-12">
                                        <select autocomplete="off"type="number" name="pax" id="people" class="form-control row-cols-6">
                                            @for ($i = 2; $i <= $reservation->table->capacity; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($i == $reservation->pax) selected @endif>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 me-5">
                                    <label for="time" class="text-nowrap">Current Time</label>
                                    <div class="col-md-12">
                                        <input type="text" name="time" id="time" class="form-control row-cols-6"
                                            value="{{ $reservation->time }}" disabled>
                                    </div>
                                </div>
                                <input hidden>
                                <div class="invalid-feedback mb-3" id="peopleError">
                                </div>
                                <div>
                                    <div>
                                        {{-- TODO:fade in j out ta slots gt fenete ashimo
                                            or na men to kamw an to kamw na erkunte ulla mazi ta tables --}}
                                        <label for="inputSlots">Availabiliy</label>
                                        <div id="inputSlots" class="input-group col-md-12 mb-2">
                                            <span id="timeSlots" class="form-control "></span>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- TODO: opou eshi description na to onomasume details --}}
                                <div class="form-group col-12 justify-content-center mb-5">
                                    <label for="description">Description</label>
                                    <textarea autocomplete="off" class="form-control" id="description" name="description" rows="3"
                                        placeholder="To drink, to eat etc...">{{ $reservation->details }}</textarea>
                                    <div class="invalid-feedback">
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
