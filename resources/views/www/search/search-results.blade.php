@if ($businesses->isEmpty())
    <div class="d-flex justify-content-center">
        <div class="row text-center">
            <h3>No results :(</h3>
            <p>No worries, you can try again!</p>
        </div>
    </div>
@else
    <div class="row">
        <h3>Results</h3>
        <p class="text-subtitle text-muted">You searched for "{{ request('search') }}" </p>
    </div>

    <div class="d-flex row">
        @foreach ($businesses as $business)
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="col-12 row-col-12">
                            <img style="height: 20rem; object-fit: cover;"
                                src="../assets/images/uploads/{{ $business->photos()->inRandomOrder()->get()->first()->photo_path }}"
                                class="card-img-top   img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $business->business_name }}</h5>
                            <p class="card-text">
                                {{ $business->description }}
                            </p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        {{-- Get two random tags --}}
                        @foreach ($business->tags->random()->limit(2) as $tag)
                            <li class="list-group-item">{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                    <a href="/user/{{ $business->username }}" class="stretched-link"></a>
                </div>
            </div>
        @endforeach
    </div>
@endif
