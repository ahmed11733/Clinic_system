 



     @extends('layouts.fixed')
     @section('content')



<body>

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
                        <a class="nav-link" aria-current="page" href="{{url('userHome')}}">home</a>
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

    <header class="fisrtaid_header d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="display-1 fw-bold text-capitalize">how to save life</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="first_aid py-5">
        <div class="container">
            <h1 class="text-capitalize h2"><span class="text-danger">first</span>Aid</h1>
            <div class="row g-4 mt-2">
                <div class="col-sm-6">
                    <div class="card shadow-sm rounded-5 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 overflow-hidden">
                                <img src=={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">heart attack</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
                                        dolor eos. Quibusdam, velit laborum.</p>
                                    <a href="./firstAidPage.html" class="text-capitalize stretched-link">read more
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-sm rounded-5 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 overflow-hidden">
                                <img src=={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">heart attack</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
                                        dolor eos. Quibusdam, velit laborum.</p>
                                    <a href="./firstAidPage.html" class="text-capitalize stretched-link">read more
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-sm rounded-5 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 overflow-hidden">
                                <img src=={{asset('assets/img/person.png')}} class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">heart attack</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
                                        dolor eos. Quibusdam, velit laborum.</p>
                                    <a href="./firstAidPage.html" class="text-capitalize stretched-link">read more
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-sm rounded-5 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 overflow-hidden">
                                <img src="./img/person.png" class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">heart attack</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
                                        dolor eos. Quibusdam, velit laborum.</p>
                                    <a href="./firstAidPage.html" class="text-capitalize stretched-link">read more
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-sm rounded-5 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 overflow-hidden">
                                <img src="./img/person.png" class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">heart attack</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
                                        dolor eos. Quibusdam, velit laborum.</p>
                                    <a href="./firstAidPage.html" class="text-capitalize stretched-link">read more
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow-sm rounded-5 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 overflow-hidden">
                                <img src="./img/person.png" class="img-cover rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="card-body">
                                    <h5 class="card-title h5 text-capitalize">heart attack</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
                                        dolor eos. Quibusdam, velit laborum.</p>
                                    <a href="./firstAidPage.html" class="text-capitalize stretched-link">read more
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navigation mt-5" aria-label="Page">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <div class="modal fade" id="register_doctor" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-header">
                    <div class="modal-title">
                        <img src="./img/logo.png" alt="" class="logo">
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
                    <img src="./img/logo.png" class="logo" alt="">
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

    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>

@endsection
