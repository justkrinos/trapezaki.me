<div class="d-flex row col-12 mb-2">
    <div class="form-group col-6 col-md-3 me-2">
        <label for="day" class="text-nowrap">Daily Reservation Range</label>
        <div class="input-group">
            <label class="input-group-text" for="day">Day</label>
            <select class="form-select form-control" id="day">
                <option value="1">Monday</option>
                <option value="2">Tuseday</option>
                <option value="3">Wednesday</option>
                <option value="4">Thursday</option>
                <option value="5">Friday</option>
                <option value="6">Saturday</option>
                <option value="7">Sunday</option>
            </select>
        </div>
    </div>

    @foreach ($settings as $setting)
        <div class="d-flex col-12 col-md-8 day @if($setting['day'] != 1) hidden-setting @endif" id="day-{{$setting['day']}}">
            <div class="col-sm-3 col-5 input-group-md mb-1">
                <label for="reservation-{{$setting['day']}}">First</label>
                <label type="time" id="first-{{$setting['day']}}" name="min-{{$setting['day']}}" class="form-control square first-reservation"
                >{{$setting['min']}}</label>
            </div>
            <div class="col-sm-3 col-5 input-group-md mb-1">
                <label for="last-reservation">Last</label>
                <label type="time" id="last-{{$setting['day']}}" name="max-{{$setting['day']}}" class="form-control square last-reservation"
                >{{$setting['max']}}</label>
            </div>
        </div>
    @endforeach

</div>
