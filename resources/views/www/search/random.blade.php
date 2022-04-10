{{-- Evre random users p en verified j active --}}
@php
$users = App\Models\User2::inRandomOrder()
    ->limit(5)
    ->where('is_verified', 1)
    ->where('status', 1)
    ->get();
@endphp

@if ($users) {{-- An iparxun users --}}

    <section id="content-types">
        <div class="row">

            {{-- User 0 --}}
            @if (count($users) > 0)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">{{ $users[0]->business_name }}</h4>
                                <p class="card-text">
                                    {{ $users[0]->description }}
                                </p>
                            </div>
                            <div class="col-12 carousel-inner">
                                <img class="img-fluid w-100" style="height: 20rem; object-fit: cover;"
                                    src="../assets/images/uploads/{{ $users[0]->photos()->inRandomOrder()->limit(1)->get()->first()->photo_path }}">
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- Get two random tags --}}
                            @foreach ($users[0]->tags->random()->limit(2) as $tag)
                                <li class="list-group-item">{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                        <a href="/user/{{ $users[0]->username }}" class="stretched-link"></a>
                    </div>
                </div>
            @endif

            {{-- User 1 --}}
            @if (count($users) > 1)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="col-12 row-col-12">
                                <img style="height: 20rem; object-fit: cover;"
                                    src="../assets/images/uploads/{{ $users[1]->photos()->inRandomOrder()->limit(1)->get()->first()->photo_path }}"
                                    class="card-img-top   img-fluid">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $users[1]->business_name }}</h5>
                                <p class="card-text">
                                    {{ $users[1]->description }}
                                </p>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- Get two random tags --}}
                            @foreach ($users[1]->tags->random()->limit(2) as $tag)
                                <li class="list-group-item">{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                        <a href="/user/{{ $users[1]->username }}" class="stretched-link"></a>
                    </div>
                </div>
            @endif

            {{-- User 2 --}}
            @if (count($users) > 2)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">{{ $users[2]->business_name }}</h4>
                            </div>
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($users[2]->photos()->inRandomOrder()->limit(3)->get()
    as $photo)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="../assets/images/uploads/{{ $photo->photo_path }}"
                                                class="d-block w-100"
                                                style="height: 17rem; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $users[2]->description }}
                                </p>
                            </div>
                        </div>
                        <a href="/user/{{ $users[2]->username }}" class="stretched-link"></a>
                    </div>
                </div>
            @endif


            {{-- User 3 --}}
            @if (count($users) > 3)
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="col-12">
                            <img class="card-img-top img-fluid" style="height: 20rem; object-fit: cover;"
                                src="../assets/images/uploads/{{ $users[3]->photos()->inRandomOrder()->limit(1)->get()->first()->photo_path }}" />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $users[3]->business_name }}</h4>
                                <p class="card-text">
                                    {{ $users[3]->description }}
                                </p>
                                <button class="btn btn-primary block">Reserve now</button>
                            </div>
                        </div>
                        <a href="/user/{{ $users[3]->username }}" class="stretched-link"></a>
                    </div>
                </div>
            @endif

            {{-- User 4 --}}
            @if (count($users) > 4)
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">{{ $users[4]->business_name }}</h4>
                                <p class="card-text">
                                    {{ $users[4]->description }}
                                </p>
                            </div>
                            <div class="col-12">
                                <img class="card-img-bottom  img-fluid"
                                    src="../assets/images/uploads/{{ $users[4]->photos()->inRandomOrder()->limit(1)->get()->first()->photo_path }}"
                                    style="height: 20rem; object-fit: cover;">
                            </div>
                            <a href="/user/{{ $users[0]->username }}" class="stretched-link"></a>
                        </div>
                    </div>
            @endif
        </div>
    </section>
@endif
