@php
$city = 'Limassol';
//TODO: na fiei tuto j na sasei
@endphp

<section class="section">
    <div class="card">
        <form method="GET" action="#">
            <div class="card-header bg-primary">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Find restaurants, bar, cafe..."
                        name="search" aria-describedby="button-addon2">
                    <button class="btn btn-outline-white bg-info" type="submit"
                        id="button-addon2">Search</button>
                </div>
                {{-- TODO: na mpun ulla ta options prin to koumpi tu search --}}
                <div class="card-content bg-primary">
                    <div class="d-flex justify-content-center">
                        <div class="form-check form-check-inline form-switch">
                            <input class="form-check-input bg-info" type="checkbox" name="food" id="switchCheck">
                            <label class="form-check-label text-white" for="switchCheck"> Food</label>
                        </div>
                        <div class="form-check form-check-inline form-switch">
                            <input class="form-check-input bg-info" type="checkbox" name="coffee" id="switchCheck">
                            <label class="form-check-label text-white" for="switchCheck"> Coffee</label>
                        </div>
                        <div class="form-check form-check-inline form-switch">
                            <input class="form-check-input bg-info" type="checkbox" name="drinks" id="switchCheck">
                            <label class="form-check-label text-white" for="switchCheck"> Drinks</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex row justify-content-center">
                    <div class="col-md-4 row-col-4 mb-3">
                        <h6 class="text-white">Date</h6>
                        <input type="date" name="date" id="mydate" class="form-control">
                    </div>

                    <div class="col-md-2 mb-2">
                        <h6 class="text-white">People </h6>
                        <fieldset class="form-group">
                            <select class="form-select" name="people" id="basicSelect">
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="col-md-3 mb-2">
                        <h6 class="text-white">City</h6>
                        <fieldset class="form-group">
                            <select class="form-select" id="citySelect" name="city">
                                <option @if ($city == 'Limassol') selected @endif>Limassol</option>
                                <option @if ($city == 'Paphos') selected @endif>Paphos</option>
                                <option @if ($city == 'Larnaca') selected @endif>Larnaca</option>
                                <option @if ($city == 'Nicosia') selected @endif>Nicosia</option>
                                <option {@if ($city == 'Famagusta') selected @endif}>Famagusta</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
