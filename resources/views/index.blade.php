@extends('layouts.fixed')
@section('content')


  <nav class="navbar navbar-expand-md navbar-light bg-wihte ">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">about us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/contact')}}">contact</a>
          </li>
        </ul>
        <div class="auth ms-auto">
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#choose_login">login</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#choose_register">register</button>
          </div>
      </div>
    </div>
  </nav>



  <!-- modal  choose register -->
  <div class="modal fade choose" id="choose_register" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content overflow-hidden">
        <div class="modal-header">
          <div class="modal-title">
            <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="choose_type" data-bs-toggle="modal" data-bs-target="#register_doctor">
                <img src={{asset('assets/img/Wear_a_Mask.png')}} class="w-100" alt="">
                <p class="text p-2 bg-secondary text-white rounded text-center">i am doctor</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="choose_type" data-bs-toggle="modal" data-bs-target="#register_patient">
                <img src={{asset('assets/img/Hello.png')}} class="w-100" alt="">
                <p class="text p-2 bg-secondary text-white rounded text-center">i am patient</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- modal  choose login -->
  <div class="modal fade choose" id="choose_login" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content overflow-hidden">
        <div class="modal-header">
          <div class="modal-title">
            <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="choose_type" data-bs-toggle="modal" data-bs-target="#login_doctor">
                <img src={{asset('assets/img/Wear_a_Mask.png')}} class="w-100" alt="">
                <p class="text p-2 bg-secondary text-white rounded text-center">i am doctor</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="choose_type" data-bs-toggle="modal" data-bs-target="#login_patient">
                <img src={{asset('assets/img/Hello.png')}} class="w-100" alt="">
                <p class="text p-2 bg-secondary text-white rounded text-center">i am patient</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- modal  patient login -->
  <form action="{{url('userLogin')}}" method="post" >
    @csrf

  <div class="modal fade" id="login_patient" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content overflow-hidden">
        <div class="modal-header">
          <div class="modal-title">
            <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <h4 class="h4 mb-1 text-capitalize">Welcome</h4>
          <form action="" class="mt-5">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" placeholder="name@example.com">
              <label>Email address *</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" placeholder="password">
              <label>password *</label>
            </div>
            <div class="mb-3 text-center">
              <a href="/" class="text-capitalize">forget your password?</a>
            </div>
            <button class="btn btn-primary btn-lg w-100">sign in</button>
            <p class="my-3 text-center">
              <!-- link open modal choose register -->
              don`t have account?<a class="text-capitalize" data-bs-toggle="modal" href="#choose_register"
                role="button"> create
                account</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  </form>



  <!-- modal  doctor login -->

  <form action="{{url('doctorLogin')}}" method="post" enctype="multipart/form-data">
    @csrf


  <div class="modal fade" id="login_doctor" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content overflow-hidden">
        <div class="modal-header">
          <div class="modal-title">
            <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <h4 class="h4 mb-1 text-capitalize">Welcome</h4>
          <form action="" class="mt-5">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" placeholder="name@example.com">
              <label>Email address *</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" placeholder="password">
              <label>password *</label>
            </div>
            <div class="mb-3 text-center">
              <a href="/" class="text-capitalize">forget your password?</a>
            </div>
            <button class="btn btn-primary btn-lg w-100">sign in</button>
            <p class="my-3 text-center">
              <!-- link open modal choose register-->
              don`t have account?<a class="text-capitalize" data-bs-toggle="modal" href="#choose_register"
                role="button"> create
                account</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  </form>




  <!-- modal  register doctor -->

  <form action="{{url('doctorRegister')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="modal fade" id="register_doctor" tabindex="-1" aria-hidden="false">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content overflow-hidden">
          <div class="modal-header">
            <div class="modal-title">
              <img src={{asset('assets/img/logo.png')}} alt="" class="logo">
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- open modal choose register -->
            <form action="">
  
              <!-- input Doctor info -->
              <div id="input_docotr">
                <div class="d-flex justify-content-between">
                  <h5 class="pointer" data-bs-toggle="modal" data-bs-target="#choose_register">
                    <i class="fa-solid fa-angle-left me-2"></i>back
                  </h5>
                  <h5 class="pointer btn_next">
                    next <i class="fa-solid fa-angle-right me-2"></i>
                  </h5>
                </div>
                <h3 class="my-3 text-capitalize">Doctor info</h3>
                <div class="upload_img rounded-circle  m-auto mb-4">
                  <input class="image-input" type="file" name="photo">
                  <span class="add_photo bg-light text-center py-4">
                    <i class="fa-solid fa-camera fs-1 text-wite"></i>
                    <p>add photo</p>
                  </span>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="name" placeholder="full name">
                  <label>full name *</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="speciality" list="specialty" placeholder="specialty">
                  <datalist id="specialty">
                    <option value="text">specialty</option>
                    <option value="text">specialty</option>
                  </datalist>
                  <label>specialty *</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="mobile_number" placeholder="phone number">
                  <label>phone number *</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" placeholder="name@example.com">
                  <label>Email address *</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" placeholder="password">
                  <label>password *</label>
                </div>

                <div class="form-floating mb-3">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="famale" value="famale">
                    <label class="form-check-label" for="famale">famale</label>
                  </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg w-100 btn_next">next</button>
  
              </div>
  
                <!-- input clinic  info -->
            <div class="d-none" id="input_clinic">
              <h5 class="pointer" id="btn_back">
                <i class="fa-solid fa-angle-left me-2"></i>back
              </h5>
              <h3 class="my-3 text-capitalize">clinic info</h3>


              {{--    ___________________ Photos  __________________________ 
                
                <div class="mb-3">
                <label for="formFile" class="form-label fw-bold">clinic photo (select 3 photo)</label>
                <input class="form-control form-control-lg" type="file" id="formFile" multiple>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label fw-bold">bill photo (select 2 photo)</label>
                <input class="form-control form-control-lg" type="file" id="formFile" multiple>
              </div> --}}


              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="governorate" placeholder="Clinic address">
                <label>Clinic address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="waitTime" min="5" max="60" placeholder="meeting time">
                <label>waiting time (minutes)</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="examinationPrice" placeholder="Detection price(eg)">
                <label>Detection price(eg)</label>
              </div>


              <div class="mb-3">
                <input type="text" name="latitude" id="lat" hidden>
                <input type="text" name="longitude" id="long" hidden>
                <button class="btn btn-light btn-lg w-100 mb-3" type="button" id="get_location_btn">get
                  location
                </button>
              </div>



              <div class="footer_form mt-3">
                <button class="btn btn-primary btn-lg w-100">sign in</button>
                <p class="my-3 text-center">
                  <!-- link open modal choose login -->
                  i have account <a class="text-capitalize" data-bs-toggle="modal" href="#choose_login"
                    role="button">login</a>
                </p>
              </div>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>

</form>




  <!-- modal  register patient -->
   
  <form action="{{url('userRegister')}}" method="post" enctype="multipart/form-data">
    @csrf

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
          <!-- open modal choose register -->
          <h5 class="pointer" data-bs-toggle="modal" data-bs-target="#choose_register">
            <i class="fa-solid fa-angle-left me-2"></i>back
          </h5>
          <form action="">

            <div class="upload_img rounded-circle  m-auto mb-4">
              <input class="image-input" type="file" name="php">
              <span class="add_photo bg-light text-center py-4">
                <i class="fa-solid fa-camera fs-1 text-wite"></i>
                <p>add photo</p>
              </span>
              
            </div>

            <div class="row">
                <div class="col-md-6 pe-md-1 mb-3">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="name" placeholder="full name *">
                      <label>full name *</label>
                    </div>
                  </div>
            </div>


            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="mobile_number" placeholder="phone number">
                <label>phone number *</label>
              </div>

              {{-- <div class="form-floating mb-3">
                <select name="gender" id="">
                  <option value="male">male</option>
                  <option value="fmale">fmale</option>

                </select>
               
              </div> --}}

              <div class="form-floating mb-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                  <label class="form-check-label" for="male">male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="famale" value="famale">
                  <label class="form-check-label" for="famale">famale</label>
                </div>
              </div>


              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label>Email address *</label>
              </div>


              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="password">
                <label>password *</label>
              </div>

  
{{-- 
            <div class="form-floating mb-3">
              <input type="date" class="form-control" name="birthdate" value="2018-07-23" min="1997-01-01" max="2030-12-31"
                placeholder="dd-mm-yyyy">
              <label for="floatingInput">Birth Date</label>
            </div> --}}


            <button class="btn btn-primary btn-lg w-100">sign in</button>
            <p class="my-3 text-center">
              <!-- link open modal choose login -->
              i have account <a class="text-capitalize" data-bs-toggle="modal" href="#choose_login"
                role="button">login</a>
            </p>
          </form>
        </div>

      </div>
    </div>
  </div>

  </form>



  

  <header class="home_header d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-7 wow animate__fadeInUp" data-wow-duration="1s">
          <h1 class="h1 text-capitalize">the most valuable thing is your health</h1>
          <p class="text-2 ">It is our honor to offer you a health service and doctors at the highest level of
            experience and efficiency</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#choose_register"
            data-bs-whatever="@mdo">register now</button>
        </div>
      </div>
    </div>
  </header>


  <section class="sercives_patient py-5 mt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center wow animate__bounceIn" data-wow-duration=".8s" data-wow-offset="200">
          <span class="text-primary fs-5">services for the patient</span>
          <h2 class="fs-1 text-capitalize">caring for the patient's health is our priority</h2>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-6 col-lg-4 mt-2 wow animate__fadeInLeft" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card border-0 bg-transparent py-3 text-center">
            <div class="card-icon text-primary display-5">
              <i class="fa-solid fa-house-chimney-medical"></i>
            </div>
            <div class="card-body">
              <h4 class="card-title text-capitalize">clinic book</h4>
              <p class="card-text text-1">Offering convenient and quick online booking for clinic appointments with our
                doctors.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mt-2 wow animate__fadeInDown" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card border-0 bg-transparent py-3 text-center">
            <div class="card-icon text-primary display-5">
              <i class="fa-solid fa-video"></i>
            </div>
            <div class="card-body">
              <h4 class="card-title text-capitalize">video call</h4>
              <p class="card-text text-1">Offering convenient and quick online booking for video call appointments with
                our doctors.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mt-2 wow animate__fadeInRight" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card border-0 bg-transparent py-3 text-center">
            <div class="card-icon text-primary display-5">
              <i class="fa-solid fa-book-atlas"></i>
            </div>
            <div class="card-body">
              <h4 class="card-title text-capitalize">medical history</h4>
              <p class="card-text text-1">Now you can put all your medical history in one place, to make it easy to
                diagnosis</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mt-2 wow animate__fadeInLeft" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card border-0 bg-transparent py-3 text-center">
            <div class="card-icon text-primary display-5">
              <i class="fa-solid fa-bell"></i>
            </div>
            <div class="card-body">
              <h4 class="card-title text-capitalize">reminder</h4>
              <p class="card-text text-1">Don't worry about your medication appointments anymore, because we will remind
                you of your medication dates</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mt-2 wow animate__fadeInUp" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card border-0 bg-transparent py-3 text-center">
            <div class="card-icon text-primary display-5">
              <i class="fa-solid fa-briefcase-medical"></i>
            </div>
            <div class="card-body">
              <h4 class="card-title text-capitalize">first aid</h4>
              <p class="card-text text-1">First aid is the first and immediate assistance given to any person suffering
                from either a minor or serious illness or injury, with care provided to preserve life, prevent the
                condition from worsening, or to promote recovery</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mt-2 wow animate__fadeInRight" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card border-0 bg-transparent py-3 text-center">
            <div class="card-icon text-primary display-5">
              <i class="fa-solid fa-file-invoice"></i>
            </div>
            <div class="card-body">
              <h4 class="card-title text-capitalize">medical history</h4>
              <p class="card-text text-1">Now you can put all your medical history in one place, to make it easy to
                diagnosis</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="sercives_patient py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 img wow animate__fadeInLeft" data-wow-duration=".8s" data-wow-offset="200">
          <img src={{asset('assets/img/clinic.jpeg')}} alt="">
        </div>
        <div class="col-md-6 p-3 wow animate__fadeInRight" data-wow-duration=".8s" data-wow-offset="200">
          <p class="fs-5 text-primary my-1">Clinic book</p>
          <h4 class="h4 text-capitalize">Choose between many clinics around you</h4>
          <p class="text-2 fw-light">We have all the specialities you will need and beside you, all you have to do is
            choose the specialisation and leave the rest to us</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register_patient">Make an
            Appointment</button>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6 p-3 order-1 order-md-0 wow animate__fadeInLeft" data-wow-duration=".8s"
          data-wow-offset="200">
          <p class="fs-5 text-primary my-1">video call</p>
          <h4 class="h4 text-capitalize">Communicate with your doctor from home</h4>
          <p class="text-2 fw-light">Our specialists will be glad to provide you with their expertise - book an
            appointment now with our doctors for diagnoses & treatment recommendation </p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register_patient">Make an
            Appointment</button>
        </div>
        <div class="col-md-6 img wow animate__fadeInRight" data-wow-duration=".8s" data-wow-offset="200">
          <img src={{asset('assets/img/video-doctor.jpeg')}} alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="doctors py-5 my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 text-center wow animate__bounceIn" data-wow-duration=".8s" data-wow-offset="200">
          <span class="text-primary fs-5">Our Qualified Doctors</span>
          <h2 class="fs-1 text-capitalize">We have highly experienced doctors</h2>
        </div>
      </div>
      <div class="row g-4 mt-3">
        <div class="col-12 col-sm-6 col-lg-4 wow animate__slideInLeft" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card rounded-3  text-center">
            <div class="card-avatar mt-3">
              <img src={{asset('assets/img//doc1.png')}} class="rounded-circle" alt="">
            </div>
            <div class="card-body">
              <h3 class="card-title mb-1 text-capitalize">ahmed eldeep</h3>
              <p class="text-secondary fs-5 text-capitalize">eyes doctor</p>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk
                of the card's content.</p>
              <ul class="socail  d-flex justify-content-center list-unstyled">
                <li class="socail__item me-3">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-facebook"></i>
                  </a>
                </li>
                <li class="socail__item me-3">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-twitter"></i>
                  </a>
                </li>
                <li class="socail__item me-2 ">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 wow animate__slideInUp" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card shadow-sm text-center">
            <div class="card-avatar mt-3">
              <img src={{asset('assets/img//doc2.png')}} class="rounded-circle" alt="">
            </div>
            <div class="card-body">
              <h3 class="card-title mb-1 text-capitalize">ahmed eldeep</h3>
              <p class="text-secondary fs-5 text-capitalize">Doctor of Dentist</p>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk
                of the card's content.</p>
              <ul class="socail  d-flex justify-content-center list-unstyled">
                <li class="socail__item me-3">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-facebook"></i>
                  </a>
                </li>
                <li class="socail__item me-3">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-twitter"></i>
                  </a>
                </li>
                <li class="socail__item me-2 ">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 wow animate__slideInRight" data-wow-duration=".8s" data-wow-offset="200">
          <div class="card shadow-sm text-center">
            <div class="card-avatar mt-3">
              <img src={{asset('assets/img//doc3.png')}} class="rounded-circle" alt="">
            </div>
            <div class="card-body">
              <h3 class="card-title mb-1 text-capitalize">ahmed eldeep</h3>
              <p class="text-secondary fs-5 text-capitalize">internal medicine doctor</p>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk
                of the card's content.</p>
              <ul class="socail  d-flex justify-content-center list-unstyled">
                <li class="socail__item me-3">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-facebook"></i>
                  </a>
                </li>
                <li class="socail__item me-3">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-twitter"></i>
                  </a>
                </li>
                <li class="socail__item me-2 ">
                  <a class="d-block fs-4" href="/">
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="numbers bg-light py-5">
    <div class="container">
      <div class="row g-3 mt-3">
        <div class="col-6 col-sm-6 col-md-3 text-center wow animate__bounceInLeft" data-wow-duration="1s"
          data-wow-offset="200">
          <div class="icon text-primary display-4">
            <i class="fa-solid fa-stethoscope"></i>
          </div>
          <h3 class="h3 mb-0">3</h3>
          <p class="text-capitalize">years of experience</p>
        </div>
        <div class="col-6 col-sm-6 col-md-3 text-center wow animate__bounceInUp" data-wow-duration="1s"
          data-wow-offset="200">
          <div class="icon text-primary display-4">
            <i class="fa-solid fa-heart-pulse"></i>
          </div>
          <h3 class="h3 mb-0">1000</h3>
          <p class="text-capitalize">Happy Patients</p>
        </div>
        <div class="col-6 col-sm-6 col-md-3 text-center wow animate__bounceInDown" data-wow-duration="1s"
          data-wow-offset="200">
          <div class="icon text-primary display-4">
            <i class="fa-solid fa-user-doctor"></i>
          </div>
          <h3 class="h3 mb-0">1200</h3>
          <p class="text-capitalize">doctors</p>
        </div>
        <div class="col-6 col-sm-6 col-md-3 text-center wow animate__bounceInRight" data-wow-duration="1s"
          data-wow-offset="200">
          <div class="icon text-primary display-4">
            <i class="fa-solid fa-users-line"></i>
          </div>
          <h3 class="h3 mb-0">20000</h3>
          <p class="text-capitalize">visitors</p>
        </div>
      </div>
    </div>
  </section>

  <section class="sercives_doctor py-5 mt-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 text-center wow animate__bounceIn" data-wow-duration=".8s" data-wow-offset="200">
          <span class="text-primary fs-5">Services for the doctors</span>
          <h2 class="fs-1 text-capitalize">We make your work easier and more accurate</h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6 img wow animate__fadeInLeft" data-wow-duration="1s" data-wow-offset="200">
          <img src={{asset('assets/img/video-doctor.jpeg')}} alt="">
        </div>
        <div class="col-md-6 p-3 wow animate__fadeInRight" data-wow-duration="1s" data-wow-offset="200">
          <p class="fs-5 text-primary my-1">video call</p>
          <h4 class="h4 text-capitalize">Apply now in video call with your patient </h4>
          <p class="text-2 fw-light">If a patient needs a consultation or inquiry, now you can follow up on your patient
            through this service</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register_doctor"
            data-bs-whatever="@mdo">Apply now</button>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6 p-3 order-1 order-md-0 wow animate__fadeInLeft" data-wow-duration="1s"
          data-wow-offset="200">
          <p class="fs-5 text-primary my-1">Add clinic </p>
          <h2 class="h4 text-capitalize">Put your clinic now on the platform </h2>
          <p class="text-2 fw-light">We will help you and publish your clinic. All you have to do is apply to the
            service, put pictures of your clinic, and leave the rest to us. </p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register_doctor"
            data-bs-whatever="@mdo">Apply now</button>
        </div>
        <div class="col-md-6 img wow animate__fadeInRight" data-wow-duration="1s" data-wow-offset="200">
          <img src={{asset('/img/clinic.jpeg')}} alt="">
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6 img wow animate__fadeInLeft" data-wow-duration="1s" data-wow-offset="200">
          <img src={{asset('assets/img/schedule.jpeg')}} alt="">
        </div>
        <div class="col-md-6 p-3 wow animate__fadeInRight" data-wow-duration="1s" data-wow-offset="200">
          <p class="fs-5 text-primary my-1">Schedule</p>
          <h4 class="h4 text-capitalize">Easily organize your appointments now</h4>
          <p class="text-2 fw-light">
            We don't forget to organise your appointments between clinic visits and video calls, in easily and quickly
            way</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register_doctor"
            data-bs-whatever="@mdo">Apply now</button>
        </div>
      </div>
    </div>
  </section>




  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#212529" fill-opacity="1"
      d="M0,288L120,256C240,224,480,160,720,149.3C960,139,1200,181,1320,202.7L1440,224L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"
      style="user-select: auto;"></path>
  </svg>
  <section class="testimonial bg-dark">
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-md-7 text-center wow animate__bounceInDown" data-wow-duration="1s" data-wow-offset="200">
          <h2 class="fs-1 text-white">Kinds Words From Customers</h2>
        </div>
      </div>
      <div class="swiper mySwiper py-5 wow animate__bounceInUp" data-wow-duration="1s" data-wow-offset="200">
        <div class="swiper-wrapper">
          <div class="swiper-slide  ">
            <div class="card p-2">
              <div class="card-body">
                <div class="icon display-3 text-primary">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
                <p class="card-text lead">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
              <div class="p-2 d-flex align-items-center">
                <img src={{asset('assets/img/doc1.png')}} class="avatar rounded-circle" alt="">
                <div class="ms-2">
                  <h6 class="mb-0 fs-5 text-capitalize">ahmed eldeep</h6>
                  <p class="m-0 fs-5 fw-light text-capitalize">doctor</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide  ">
            <div class="card p-2">
              <div class="card-body">
                <div class="icon display-3 text-primary">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
                <p class="card-text lead">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
              <div class="p-2 d-flex align-items-center">
                <img src={{asset('assets/img/doc1.png')}} class="avatar rounded-circle" alt="">
                <div class="ms-2">
                  <h6 class="mb-0 fs-5 text-capitalize">ahmed eldeep</h6>
                  <p class="m-0 fs-5 fw-light text-capitalize">doctor</p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide  ">
            <div class="card p-2">
              <div class="card-body">
                <div class="icon display-3 text-primary">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
                <p class="card-text lead">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
              </div>
              <div class="p-2 d-flex align-items-center">
                <img src={{asset('assets/img/doc1.png')}} class="avatar rounded-circle" alt="">
                <div class="ms-2">
                  <h6 class="mb-0 fs-5 text-capitalize">ahmed eldeep</h6>
                  <p class="m-0 fs-5 fw-light text-capitalize">doctor</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#212529" fill-opacity="1"
      d="M0,128L120,144C240,160,480,192,720,176C960,160,1200,96,1320,64L1440,32L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"
      style="user-select: auto;"></path>
  </svg>




  <footer class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-4">
          <img src={{asset('assets/img/logo.png')}} class="logo" alt="">
          <p class="mt-3">Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#choose_login">login</button>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#choose_register">sign up</button>
        </div>
        <div class="col-md-2 mt-4">
          <ul class="list-unstyled">
            <h5 class="mb-4">Navigation</h5>
            <li class="mb-2 text-capitalize">
              <a href="/" class="text-dark d-block">home</a>
            </li>
            <li class="mb-2 text-capitalize">
              <a href="/" class="text-dark d-block">about us</a>
            </li>
            <li class="mb-2 text-capitalize">
              <a href="/" class="text-dark d-block">contact us</a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 mt-4 ms-auto">
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
          <h6 class="fs-5 text-capitalize">socail media:</h6>
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
