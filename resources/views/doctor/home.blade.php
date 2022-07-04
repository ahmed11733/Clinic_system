 


 @extends('layouts.fixed')
 @section('content')
 <style>
    table, th, td {
      border:1px solid black;
      width: 40%;
    }
    </style>
    <nav class="navbar navbar-expand-md navbar-light bg-wihte">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src={{asset('assets/img/logo.png')}} class="logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/doctorHome')}}">home</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/profile')}}">my profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/schedule')}}">schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/about')}}">about us </a>
                    </li>
                </ul>

                <form action="{{url('DRlogout')}}" method="post">
                    @csrf
                    <div class="logout ms-auto">
                        <button class="btn btn-danger">logout</button>
                    </div>
               </form>





            </div>
        </div>
    </nav>

    <header class="header_doctor d-flex align-items-center">
        <div class="container">
           
           
            <table>
                <tr>
                  <th>Day</th>
                  <br>
                  <th>Start</th>
                  <br>
                  <th>End</th>
                  <br>
                  <th>Action</th>
                <br>
                </tr>
               
                <tr>
                    @foreach ($week as $item)
               
                  <td> {{$item->name}}</td>
                  
                  <td> {{$item->start}}</td>
                  <td>  {{$item->end}}</td>

                  <td>  

                    <form action="{{url('deleteWorkingTime/'.$item->id)}}" method="post">

                        @csrf
                        <button class="btn btn-danger btn-lg w-100">Delete</button>
                    </form>
                    
                </td>

                

                </tr>                @endforeach

              </table>
            <div class="row">

               
                   
                  

               
                <div class="col-md-6 text-white ms-auto">
                    <h1 class="h1 text-capitalize">make a schedule Appointment</h1>
                    <p class="text-2"> 
<form action="{{url('addweek')}}" method="post">
@csrf
<label class="form-label label-1 text-capitalize">Day</label>
<select name="name" id="name">
    <option value="saturday">saturday</option>
    <option value="sunday">sunday</option>
    <option value="monday">monday</option>
    <option value="tuesday">tuesday</option>
    <option value="wednesday">wednesday</option>
    <option value="thursday">thursday</option>
    <option value="friday">friday</option>
  
</select>
<label class="form-label label-1 text-capitalize">Start</label>
<select name="start" id="start">
    <option value="1 am">1 am</option>
    <option value="2 am">2 am</option>
    <option value="3 am">3 am</option>
    <option value="4 am">4 am</option>
    <option value="5 am">5 am</option>
    <option value="6 am">6 am</option>
    <option value="7 am">7 am</option>
    <option value="8 am">8 am</option>
    <option value="9 am">9 am</option>
    <option value="10 am">10 am</option>
    <option value="11 am">11 am</option>
    <option value="12 am">12 am</option>
    <option value="1 bm">1 bm</option>
    <option value="2 bm">2 bm</option>
    <option value="3 bm">3 bm</option>
    <option value="4 bm">4 bm</option>
    <option value="5 bm">5 bm</option>
    <option value="6 bm">6 bm</option>
    <option value="7 bm">7 bm</option>
    <option value="8 bm">8 bm</option>
    <option value="9 bm">9 bm</option>
    <option value="10 bm">10 bm</option>
    <option value="11 bm">11 bm</option>
    <option value="12 bm">12 bm</option>
</select>
{{--<input type="text"class="form-control" name="start">
 comment <input type="text"class="form-control" name="end">
--}}
<label class="form-label label-1 text-capitalize">End</label>
<select name="end" id="end">
    <option value="1 am">1 am</option>
    <option value="2 am">2 am</option>
    <option value="3 am">3 am</option>
    <option value="4 am">4 am</option>
    <option value="5 am">5 am</option>
    <option value="6 am">6 am</option>
    <option value="7 am">7 am</option>
    <option value="8 am">8 am</option>
    <option value="9 am">9 am</option>
    <option value="10 am">10 am</option>
    <option value="11 am">11 am</option>
    <option value="12 am">12 am</option>
    <option value="1 bm">1 bm</option>
    <option value="2 bm">2 bm</option>
    <option value="3 bm">3 bm</option>
    <option value="4 bm">4 bm</option>
    <option value="5 bm">5 bm</option>
    <option value="6 bm">6 bm</option>
    <option value="7 bm">7 bm</option>
    <option value="8 bm">8 bm</option>
    <option value="9 bm">9 bm</option>
    <option value="10 bm">10 bm</option>
    <option value="11 bm">11 bm</option>
    <option value="12 bm">12 bm</option>
</select>


                     <button class="btn btn-primary btn-lg w-100">add clinic week days</button>


</form>

                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </header>



    <div class="news container mt-5 py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card rounded-5 text-white overflow-hidden">
                    <a href="/" class="stretched-link"></a>
                    <img src={{asset('assets/img/clinic.jpeg')}} class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-content p-3 position-absolute bottom-0 start-0">
                            <h5 class="card-title fs-4 text-capitalize">this is title article </h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card rounded-5 text-white overflow-hidden">
                    <a href="/" class="stretched-link"></a>
                    <img src={{asset('assets/img/clinic.jpeg')}} class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-content p-3 position-absolute bottom-0 start-0">
                            <h5 class="card-title fs-5 text-capitalize">this is title article </h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                to.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card rounded-5 text-white overflow-hidden">
                    <a href="/" class="stretched-link"></a>
                    <img src={{asset('assets/img/clinic.jpeg')}} class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-content p-3 position-absolute bottom-0 start-0">
                            <h5 class="card-title fs-5 text-capitalize">this is title article </h5>
                            <p class="text-1">This is a wider card with supporting text below as a natural lead-in to
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded-5 text-white overflow-hidden">
                    <a href="/" class="stretched-link"></a>
                    <img src={{asset('assets/img/clinic.jpeg')}} class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-content p-3 position-absolute bottom-0 start-0">
                            <h5 class="card-title fs-5 text-capitalize">this is title article </h5>
                            <p class="text-1">This is a wider card with supporting text below as a natural lead-in to
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded-5 text-white overflow-hidden">
                    <a href="/" class="stretched-link"></a>
                    <img src={{asset('assets/img/clinic.jpeg')}} class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-content p-3 position-absolute bottom-0 start-0">
                            <h5 class="card-title fs-5 text-capitalize">this is title article </h5>
                            <p class="text-1">This is a wider card with supporting text below as a natural lead-in to
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src={{asset('assets/img/schedule.jpeg')}} alt="">
                </div>
                <div class="col-md-6 p-5">
                    <h1 class="h2 text-capitalize">make a schedule Appointment</h1>
                    <p class="text-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere illo
                        nihil et, pariatur dolorem velit hic nobis delectus.</p>
                    <button class="btn btn-primary btn-lg w-100">add clinic</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 pe-5 order-1 order-md-0 ">
                    <h1 class="h2 text-capitalize">join online calls with patient now</h1>
                    <p class="text-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere illo
                        nihil et, pariatur dolorem velit hic nobis delectus.</p>
                    <button class="btn btn-primary btn-lg w-100">add clinic</button>
                </div>
                <div class="col-md-6">
                    <img src{{asset('assets/img/clinic.jpeg')}} alt="">
                </div>
            </div>
        </div>
    </section>

    <div class="container rounded-5 mt-5 p-0 bg-light">
        <img src={{asset('assets/img/man-jacket.png')}} class="img-fulid" alt="">
        <div class="row py-5 px-3 d-flex justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="fs-1 text-capitalize">make it easire to you</h2>
                <p class="text-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, deleniti cum!</p>
                <button class="btn btn-primary btn-lg">add clinic</button>
            </div>
        </div>

    </div>
    </section>

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


    <div class="modal fade" id="register_patient" tabindex="-1" aria-hidden="false">
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
                            <input type="file" name="file" id="file_upload">
                            <span class="bg-light text-center py-4">
                                <i class="fa-solid fa-camera fs-1 text-wite"></i>
                                <p>add photo</p>
                            </span>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-6 pe-md-1 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="first name">
                                    <label>first name *</label>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-1">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="last name">
                                    <label>last name *</label>
                                </div>
                            </div>
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
                            <input type="date" class="form-control" value="2018-07-23" min="1997-01-01" max="2030-12-31"
                                placeholder="dd-mm-yyyy">
                            <label for="floatingInput">Birth Date</label>
                        </div>
                        <button class="btn btn-primary btn-lg w-100">sign in</button>
                        <p class="my-3 text-center">
                            i have account <a class="text-capitalize" data-bs-toggle="modal" href="#login"
                                role="button">login</a>
                        </p>
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
                            <a href="./profileDoctor.html" class="text-dark d-block">my profile</a>
                        </li>
                        <li class="mb-2 text-capitalize">
                            <a href="./schedule.html" class="text-dark d-block">Schedule</a>
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
                        <h5 class="mb-4 text-capitalize">are you patient?</h5>
                        <li class="mb-2 text-capitalize">

                            <a href="/" class="text-dark d-block" data-bs-toggle="modal"
                                data-bs-target="#register_patient">join now</a>
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

    @endsection
