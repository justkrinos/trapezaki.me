<div class="d-flex col-12 mb-2">
    <div class="col-5 me-2">
        <label for="day">Daily Reservation Range</label>
        <div class="input-group">
            <label class="input-group-text" for="day">Day</label>
            <select class="form-select form-control" id="day">
                <option>Monday</option>
                <option>Tuseday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select>
        </div>
    </div>



    {{-- MONDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="monday-reservation">First Reservation</label>
            <input type="text" id="monday-first" name="monday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="last-reservation">Last Reservation</label>
            <input type="text" id="monday-last" name="monday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>


    {{-- TUESDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="tueaday-first">First Reservation</label>
            <input type="text" id="tuesday-first" name="tuesday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="tuesday-last">Last Reservation</label>
            <input type="text" id="tuesday-last" name="tuesday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>

    {{-- WEDNESDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="wednesday-first">First Reservation</label>
            <input type="text" id="wednesday-first" name="wednesday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="wednesday-last">Last Reservation</label>
            <input type="text" id="wednesday-last" name="wednesday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>

    {{-- THURSDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="thursday-first">First Reservation</label>
            <input type="text" id="thursday-first" name="thursday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="thursday-last">Last Reservation</label>
            <input type="text" id="thursday-last" name="thursday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>

    {{-- FRIDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="friday-first">First Reservation</label>
            <input type="text" id="friday-first" name="friday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="friday-last">Last Reservation</label>
            <input type="text" id="friday-last" name="friday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>

    {{-- SATURDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="saturday-first">First Reservation</label>
            <input type="text" id="saturday-first" name="monday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="saturday-last">Last Reservation</label>
            <input type="text" id="saturday-last" name="saturday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>

    {{-- SUNDAY --}}
    <div class="d-flex col-8" style="display: none;">
        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="first-reservation">First Reservation</label>
            <input type="text" id="first-reservation" name="monday-min" class="form-control square first-reservation"
                value="21:30">
        </div>

        <div class="col-sm-4 col-4 input-group-md mb-1">
            <label for="last-reservation">Last Reservation</label>
            <input type="text" id="last-reservation" name="monday-max" class="form-control square last-reservation"
                value="21:30">
        </div>
    </div>

</div>
