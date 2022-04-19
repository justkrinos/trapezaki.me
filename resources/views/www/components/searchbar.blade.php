<section class="section">
    <div class="card">
        <div class="card-header bg-primary">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Find restaurants, bar, cafe..."
                    aria-describedby="button-addon2">
                <button class="btn btn-outline-white bg-info" type="button" id="button-addon2">Search</button>
            </div>
            {{-- TODO: na mpun ulla ta options prin to koumpi tu search? --}}
            <div class="card-content bg-primary">
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline form-switch">
                        <input class="form-check-input bg-info" type="checkbox" id="switchCheck">
                        <label class="form-check-label text-white" for="switchCheck"> Food</label>
                    </div>
                    <div class="form-check form-check-inline form-switch">
                        <input class="form-check-input bg-info" type="checkbox" id="switchCheck">
                        <label class="form-check-label text-white" for="switchCheck"> Coffee</label>
                    </div>
                    <div class="form-check form-check-inline form-switch">
                        <input class="form-check-input bg-info" type="checkbox" id="switchCheck">
                        <label class="form-check-label text-white" for="switchCheck"> Drinks</label>
                    </div>
                </div>
                <div class="d-flex row justify-content-center">
                    <div class="col-md-4 row-col-4 mb-3">
                        <h6 class="text-white">Date</h6>
                        <input type="date" id="mydate" class="form-control" value="2017-06-01">
                    </div>

                    <div class="col-md-2 mb-2">
                        <h6 class="text-white">People </h6>
                        <fieldset class="form-group">
                            <select class="form-select" id="basicSelect">
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
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
                            <select class="form-select" id="basicSelect">
                                <option>Limassol</option>
                                <option>Paphos</option>
                                <option>Larnaca</option>
                                <option>Nicosia</option>
                                <option>Famagusta</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
