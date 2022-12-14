@extends('layouts.fixed')
@section('content')



  <nav class="navbar navbar-expand-md navbar-light bg-wihte">
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
            <a class="nav-link" aria-current="page" href="{{url('/')}}">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">about us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('/contact')}}">contact</a>
          </li>
        </ul>
        <div class="auth ms-auto">
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#login">login</button>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#choose">register</button>
        </div>
      </div>
    </div>
  </nav>
  <div class="modal fade" id="choose" tabindex="-1" aria-hidden="false">
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
                <img src={{asset('assets/img/Wear a Mask.png')}} class="w-100" alt="">
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

  <div class="modal fade" id="login" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content overflow-hidden">
        <div class="modal-header">
          <div class="modal-title">
            <img src=={{asset('assets/img/logo.png')}} alt="" class="logo">
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <h4 class="h4 mb-1 text-capitalize">Welcome</h4>
          <form action="" class="mt-5">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" placeholder="name@example.com">
              <label>Email address *</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" placeholder="password">
              <label>password *</label>
            </div>
            <div class="mb-3 text-center">
              <a href="/" class="text-capitalize">forget your password?</a>
            </div>
            <button class="btn btn-primary btn-lg w-100">sign in</button>
            <p class="my-3 text-center">
              don`t have account?<a class="text-capitalize" data-bs-toggle="modal" href="#choose" role="button"> create
                account</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

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
              <input type="text" class="form-control" name="specialty" list="specialty" placeholder="specialty">
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
            <p class="my-3 text-center">
              i have account <a class="text-capitalize" data-bs-toggle="modal" href="#login" role="button">login</a>
            </p>
          </form>
        </div>

      </div>
    </div>
  </div>


  <header class="header_contact bg-light d-flex align-items-center bg-gradient-blue py-5">
    <div class="container">
      <div class="row">
        <div class="header_text py-5 col-md-6 order-1 order-md-0">
          <h1 class="text-wihte">Contact us now easily</h1>
          <p class="text-2">Naxly bring the power of data science and artificial intelligence to every
            business.</p>
        </div>
        <div class="col-md-6 ">
          <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_tvxeldei.json" background="transparent"
            speed="1" style="width: 100%; height: 100%;" loop autoplay>
          </lottie-player>
        </div>
      </div>
    </div>
  </header>


  <section class="contact py-5">
    <div class="container">
      <div class="row py-5 justify-content-center">
        <div class="col-md-10">
          <div class="card shadow p-4">
            <h4 class="h4 mb-0 text-capitalize">send a message</h4>
            <p class="text-1">We will be happy to receive your inquiries and suggestions.</p>
            <form action="" class="mt-3">
              <div class="row">
                <div class="col-12 col-md-6 mb-3">
                  <label class="form-label label-1 text-capitalize">name</label>
                  <input type="text" class="form-control" placeholder="enter your name">
                </div>
                <div class="col-12 col-md-6 mb-3">
                  <label class="form-label label-1 text-capitalize">email</label>
                  <input type="email" class="form-control" placeholder="enter your email">
                </div>
              </div>
              <div class="row">

                <div class="col-12 col-md-12 mb-3">
                  <label class="form-label label-1 text-capitalize">Subject</label>
                  <select class="form-select">
                    <option selected>complaint</option>
                    <option value="1">Suggestion</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label label-1 text-capitalize">message</label>
                <textarea class="form-control message" placeholder="enter your message" rows="3"></textarea>
              </div>
              <button class="btn btn-primary">Send Messege</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>


  <footer class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-4">
          <img src={{asset('assets/img/logo.png')}} class="logo" alt="">
          <p class="mt-3">Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum</p>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">login</button>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#choose">sign up</button>
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
