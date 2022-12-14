 



     @extends('layouts.fixed')
     @section('content')



    <nav class="navbar navbar-expand-lg navbar-light bg-wihte">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src={{asset('assets/img/logo.png')}} class="logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/userHome')}}">home</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/userProfile')}}">my profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('search')}}">search a doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('firstAid')}}">first aid </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/showMedicalHistory')}}">medical history</a>
                    </li>
                </ul>


                <form action="{{url('userlogout')}}" method="post">
                    @csrf
                <div class="logout ms-auto">
                    <button class="btn btn-danger">logout</button>
                </div>
            </form>


           
            </div>
        </div>
    </nav>


    <header class="header_patient position-relative">
        <img src={{asset('assets/img/doctor-cover.webp')}} class="img-cover" alt="">
        <div class="container px-2 px-sm-0  position-absolute top-100 start-50 translate-middle">
            <div class="card rounded-3 p-4 shadow-sm">
                <ul class="nav nav-tabs flex-nowrap" id="myTab" role="tablist">
                    <li class="nav-item w-50 text-center" role="presentation">
                        <h5 class="text-capitalize fs-4 nav-link active py-3" id="booking-tab" data-bs-toggle="tab"
                            data-bs-target="#booking" type="button" role="tab" aria-controls="booking"
                            aria-selected="true">
                            book a doctor
                        </h5>
                    </li>
{{-- 
                    <li class="nav-item w-50 text-center" role="presentation">
                        <h5 class="text-capitalize fs-4 nav-link py-3" id="call-tab" data-bs-toggle="tab"
                            data-bs-target="#call" type="button" role="tab" aria-controls="call" aria-selected="false">
                            call doctor
                        </h5>
                    </li> --}}


                </ul>
                <div class="tab-content mt-3">

                    <!-- form book a doctor -->
                    <div class="tab-pane active" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                        <form action="{{url('search')}}" class="row gx-1 gy-2 mb-3">
                            <div class="col-12 col-sm-6 col-md">
                                <div class="form-floating">
                                    <select class="form-select" name="search" id="search">
                                        <option value="''"></option>  
                                        @foreach ($doctor as $item)
                                            
                                     <option value="{{$item->speciality}}">{{$item->speciality}}</option>
                                        
                                          @endforeach
                                    </select>
                                    <label for="floatingInput">specialty </label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md">
                                <div class="form-floating">
                                    <select class="form-control"   name="governorate" placeholder="area">
                                     
                                        <option value="''"></option>  
                                        @foreach ($doctor as $item)
                                            

                                        
                                        <option value="{{$item->governorate}}">{{$item->governorate}}</option>
                                            
                                            @endforeach
                                        </select>
                                     <label for="floatingInput">choose area</label>
                                </div>
                            </div>

                            

                            <div class="col-12 col-sm-6 col-md">
                                <div class="form-floating">
                                    <select class="form-control"   name="name" placeholder="area">
                                     
                                        <option value="''"></option>  
                                        @foreach ($doctor as $item)
                                            

                                        
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                            
                                            @endforeach
                                        </select>                                    <label>doctor name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <button class="btn btn-primary btn-lg w-100 h-100">search</button>
                            </div>
                        </form>
                    </div>

                    <!-- form call a doctor -->
                    {{-- <div class="tab-pane" id="call" role="tabpanel" aria-labelledby="call-tab">
                        <form action="" class="row gx-1 gy-2 mb-3">
                            <div class="col-12 col-sm-6 col-md">
                                <div class="form-floating">
                                    <select class="form-select" name="speciality" id="floatingSelect">
                                        <option value="''"></option>  

                                        @foreach ($doctor as $item)
                                            
                                        <option value="{{$item->speciality}}">{{$item->speciality}}</option>
                                           
                                             @endforeach
                                      
                                    </select>
                                    <label for="floatingInput">specialty </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <button class="btn btn-primary btn-lg w-100 h-100">search</button>
                            </div>
                        </form>
                    </div> --}}


                </div>
            </div>
        </div>
    </header>


    <section class="features_patient">
        <div class="container">
            <h2 class="text-capitalize h3">our features</h2>
            <div class="row g-4 mt-2">
                <div class="col-sm-6">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5">
                                <img src={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">book a clinic</h5>
                                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <a href="/" class="text-capitalize">
                                        book now <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-sm-6">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5">
                                <img src={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>


                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">doctor call</h5>
                                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <a href="/" class="text-capitalize">
                                        book now <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div> --}}


                <div class="col-sm-6">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5">
                                <img src={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">medical history</h5>
                                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <a href="/" class="text-capitalize">
                                        book now <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5">
                                <img src={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">first aid</h5>
                                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <a href="/" class="text-capitalize">
                                        book now <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="specialty mt-5 py-5 bg-light">
        <div class="container">
            <h2 class="text-capitalize h3">our specialty</h2>
           
     
            <div class="swiper specialty_Swiper mt-3 pb-5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        @if ($s!=null)
                            now you already selected doctor
                            @foreach ($s as $item)
                            <img src="{{asset(str_replace('public/','storage/',$item->photo))}}" class="logo">
                            <div class="card-body text-center"> 
                                <h6 class="card-title h6 m-0 text-capitalize">{{$item->speciality}}</h6>
                                <h6 class="card-title h6 m-0 text-capitalize">DR {{$item->name}}</h6>

                            @endforeach
                            @else
                       
                        <div class="card shadow"> @foreach ($doctor as $item)
                            <img src="{{asset(str_replace('public/','storage/',$item->photo))}}" class="logo">
                            <div class="card-body text-center"> 
                                <h6 class="card-title h6 m-0 text-capitalize">{{$item->speciality}}</h6>
                                <h6 class="card-title h6 m-0 text-capitalize">DR {{$item->name}}</h6>
<form action="{{url('select/'.$item->id)}}" method="post">
    @csrf
    <input type="submit" value="select this doctor" >
</form>
                            </div>
                                                  
        
                            </div>  @endforeach    
                    </div>
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
         </div>
        </div>
    </section> --}}


    <section class="app_phone mt-5 pt-5">
        <div class="features_app container">
            <h2 class="text-capitalize h3">our mobile app</h2>
            <div class="row g-3 mt-3">
                <div class="col-sm-6 col-md-3">
                    <span class="text-primary fs-2 d-block mb-2">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </span>
                    <h6 class="h6 text-capitalize">All you need here</h6>
                    <p class="text-1">Search and book an examination with a doctor in a clinic, hospital, home visit, or
                        via a call. You can also order medicines, or book a service or operation at the best price. </p>
                </div>
                <div class="col-sm-6 col-md-3">
                    <span class="text-primary fs-3 d-block mb-2">
                        <i class="fa-solid fa-user-plus"></i>
                    </span>
                    <h6 class="h6 text-capitalize">Real reviews from patients</h6>
                    <p class="text-1">Doctors' reviews are from patients who have already booked and visited the doctor.
                    </p>
                </div>
                <div class="col-sm-6 col-md-3">
                    <span class="text-primary fs-3 d-block mb-2">
                        <i class="fa-solid fa-calendar-check"></i>
                    </span>
                    <h6 class="h6 text-capitalize">Your reservation is confirmed with the doctor</h6>
                    <p class="text-1">Your reservation is confirmed as soon as you choose from the available
                        appointments for Dr.</p>
                </div>
                <div class="col-sm-6 col-md-3">
                    <span class="text-primary fs-3 d-block mb-2">
                        <i class="fa-solid fa-user-shield"></i>
                    </span>
                    <h6 class="h6 text-capitalize">Book for free, pay at the clinic</h6>
                    <p class="text-1">The price of the examination is the same as the examination price in the clinic,
                        without any additional costs. </p>
                </div>
            </div>
        </div>
        <div class="download_app container  mt-5  bg-primary pt-5">
            <div class="row">
                <div class="col-md-5 px-3 px-lg-4">
                    <img src={{asset('assets/img/images.png')}} class="w-100" alt="">
                </div>
                <div class="col-md-7 py-5 px-3">
                    <h2 class="fs-1 text-white text-capitalize">download our app now</h2>
                    <p class="text-2 text-white fw-light">Lorem ipsum dolor sit, amet conse ctetur adipisicing elit.</p>

                    <div class="download_link">
                        <a href="/" class="btn btn-light btn-lg">
                            <i class="fa-brands fa-google-play"></i>
                            google play
                        </a>
                        <a href="/" class="btn btn-light btn-lg vertical-middle">
                            <i class="fa-brands fa-apple fs-3"></i>
                            app store
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="register_doctor" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-header">
                    <div class="modal-title">
                        <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="pointer" data-bs-toggle="modal" data-bs-target="#choose">
                        <i class="fa-solid fa-angle-left me-2"></i>back
                    </h5>
                    <form action="">
                        <div class="upload_img rounded-circle  m-auto mb-4">
                            <input type="file" name="image" id="file_upload">
                            <span class="bg-light text-center py-4">
                                <i class="fa-solid fa-camera fs-1 text-wite"></i>
                                <p>add photo</p>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pe-md-1 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="first name *">
                                    <label>first name *</label>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-1 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="name@example.com">
                                    <label>last name *</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="specialty" list="specialty"
                                placeholder="specialty">
                            <datalist id="specialty">
                                <option value="text">specialty</option>
                            </datalist>
                            <label>specialty *</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="phone number">
                            <label>phone number *</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" placeholder="name@example.com">
                            <label>Email address *</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" placeholder="password">
                            <label>password *</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" placeholder="enter mobile number">
                            <label for="floatingInput">Birth Date</label>
                        </div>
                        <button class="btn btn-primary btn-lg w-100">sign in</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <footer class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-4">
                    <img src={{asset('assets/img/logo.png')}} class="logo" alt="">
                    <p class="mt-3">Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum</p>
                </div>
                <div class="col-md-2 mt-4">
                    <ul class="list-unstyled">
                        <h5 class="mb-4">Navigation</h5>
                        <li class="mb-2 text-capitalize">
                            <a href="/" class="text-dark d-block">home</a>
                        </li>
                        <li class="mb-2 text-capitalize">
                            <a href="./profilePatient.html" class="text-dark d-block">my profile</a>
                        </li>
                        <li class="mb-2 text-capitalize">
                            <a href="./searchDoctor.html" class="text-dark d-block">Search A Doctor</a>
                        </li>
                        <li class="mb-2 text-capitalize">
                            <a href="./firstAid.html" class="text-dark d-block">First Aid</a>
                        </li>
                        <li class="mb-2 text-capitalize">
                            <a href="./about.html" class="text-dark d-block">about us</a>
                        </li>
                        <li class="mb-2 text-capitalize">
                            <a href="./contact.html" class="text-dark d-block">contact us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 mt-4">
                    <ul class="list-unstyled">
                        <h5 class="mb-4 text-capitalize">are you doctor?</h5>
                        <li class="mb-2 text-capitalize">

                            <a href="/" class="text-dark d-block" data-bs-toggle="modal"
                                data-bs-target="#register_doctor">join now</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-4 mt-4">
                    <h5 class="mb-4 text-capitalize">download & follow</h5>
                    <div class="download_link">
                        <a href="/" class="btn btn-dark btn-lg mb-3">
                            <i class="fa-brands fa-google-play"></i>
                            google play
                        </a>
                        <a href="/" class="btn btn-dark btn-lg mb-3">
                            <i class="fa-brands fa-apple fs-3"></i>
                            app store
                        </a>
                    </div>
                    <h6 class="fs-5 text-capitalize">social media:</h6>
                    <ul class="socail  d-flex list-unstyled">
                        <li class="socail__item me-3">
                            <a class="d-block fs-2" href="/">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </li>

                        <li class="socail__item me-2 ">
                            <a class="d-block fs-2" href="/">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="./js/swiper-bundle.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script>
        let swiper = new Swiper(".specialty_Swiper", {
            slidesPerView: 2,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    </script>

        @endsection
