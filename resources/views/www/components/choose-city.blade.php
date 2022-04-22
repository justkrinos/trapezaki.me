 <div class="modal fade text-left" id="chooseCity" tabindex="-1" role="dialog" aria-labelledby="choose-city-modal"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header d-flex justify-content-center">
                 <h4 class="modal-title">Choose a City</h4>
             </div>
             <div class="modal-body">
                 <header class="mb-3">

                     <!-- Basic card section start -->
                     <section id="content-types">
                        @csrf
                         <div class="d-flex row justify-content-center col-12">
                             <div class="col-lg-4 col-4 hover-zoom">
                                 <div class="card bg-light">
                                     <a href="#" id="Limassol" class="city-option" data-bs-dismiss="modal">
                                         <div class="card-content">
                                             <img src="/assets/images/Limassol.jpg" class="card-img-top img-fluid">
                                             <div class=" text-center">
                                                 <h5 class="mt-2 text-nowrap">Limassol</h5>
                                                 {{-- <a href="/make-a-reservation" class="stretched-link"></a> --}}
                                             </div>
                                         </div>
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item bg-light">The mini dubai.</li>
                                         </ul>
                                     </a>
                                 </div>
                             </div>

                             <div class=" col-lg-4 col-4  hover-zoom">
                                 <div class="card bg-light">
                                     <a href="#" id="Nicosia" class="city-option" data-bs-dismiss="modal">
                                         <div class="card-content">
                                             <img src="/assets/images/Nicosia.jpg" class="card-img-top img-fluid">
                                             <div class="text-center">
                                                 <h5 class="mt-2 text-nowrap">Nicosia</h5>
                                             </div>
                                         </div>
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item  bg-light">The heart of Cyprus.</li>
                                         </ul>
                                     </a>
                                 </div>
                             </div>

                             <div class=" col-lg-4 col-4  hover-zoom">
                                 <div class="card bg-light">
                                     <a href="#" id="Paphos" class="city-option" data-bs-dismiss="modal">
                                         <div class="card-content">
                                             <img src="/assets/images/Paphos.jpg" class="card-img-top img-fluid">
                                             <div class=" text-center">
                                                 <h5 class="mt-2 text-nowrap">Paphos</h5>
                                             </div>
                                         </div>
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item bg-light">The best city of all.</li>
                                         </ul>
                                     </a>
                                 </div>
                             </div>

                             <div class=" col-lg-4 col-4  hover-zoom" >
                                 <div class="card bg-light">
                                     <a href="#" id="Larnaca" class="city-option" data-bs-dismiss="modal">
                                         <div class="card-content">
                                             <img src="/assets/images/Larnaca.jpg" class="card-img-top img-fluid">
                                             <div class=" text-center">
                                                 <h5 class="mt-2 text-nowrap">Larnaca</h5>
                                                 {{-- <a href="/make-a-reservation" class="stretched-link"></a> --}}
                                             </div>
                                         </div>
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item bg-light">The city of dreams.</li>
                                         </ul>
                                     </a>
                                 </div>
                             </div>

                             <div class=" col-lg-4 col-4  hover-zoom">
                                 <div class="card bg-light">
                                     <a href="#" id="Famagusta" class="city-option" data-bs-dismiss="modal">
                                         <div class="card-content">
                                             <img src="/assets/images/Amoxostos.jpg" class="card-img-top img-fluid">
                                             <div class="text-center">
                                                 <h5 class="mt-2 text-nowrap">Famagusta</h5>
                                             </div>
                                         </div>
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item  bg-light">The city of nightlife.</li>
                                         </ul>
                                     </a>
                                 </div>
                             </div>
                         </div>


                     </section>
             </div>
         </div>
     </div>
 </div>
