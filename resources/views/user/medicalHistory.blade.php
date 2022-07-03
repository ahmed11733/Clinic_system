


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
                        <a class="nav-link" href="./searchDoctor.html">search a doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./firstAid.html">first aid </a>
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

    <header class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-lg-9">
                <h2 class="fs-1 text-capitalize">The patient's medical history</h2>
                <p class="text-2">The following questionaire is a comprehensive look at your health. It will take about
                    5 minutes to complete
                </p>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-sm-12 col-lg-9">

                <!-- card and form patient information -->


                                            
                                {{-- @foreach ($mh as $item) --}}

                               
                         

                                    
                              


                <div class="card mb-4 shadow-sm rounded-5 p-4">
                    <h4 class="h4 mb-0 text-capitalize">patient information</h4>
                    <form action="" class="mt-3 row" id="patient_info">
                        <div class="col-12 col-md-6 mb-3">

                            @if ($mh == null)
 
                        </form>
                         <form action="{{url('addMedicalHistoryy')}}" method="post">
                        @csrf          
                        <label class="form-label label-1 text-capitalize">height</label>
                        <input type="number"class="form-control" name="height" id="">
                        <label class="form-label label-1 text-capitalize">weight</label>
                        <input type="number"class="form-control" name="weight" id="">

                        <label class="form-label label-1 text-capitalize">relationshipState</label>
                        <input type="text"class="form-control" name="relationshipState" id="">

                        <label class="form-label label-1 text-capitalize">Chronic diseases</label>
                        <input type="text" class="form-control"name="diseases" id="">

                        <label class="form-label label-1 text-capitalize"> bloodType</label>
                        <input type="text"class="form-control" name="bloodType" id="">

                         <input type="submit" class="btn btn-success" value="add">

                        </form>  
                        @else
                        @foreach ($mh as $item)
                            
                       
                        <form action="{{url('updateMedicalHistoryy/'.$item->id)}}" method="put">
                            @csrf          
                            <label class="form-label label-1 text-capitalize">height</label>
                            <input type="number"class="form-control" name="height" value="{{$item->height}}">
                            <label class="form-label label-1 text-capitalize">weight</label>
                            <input type="number"class="form-control" name="weight" value="{{$item->weight}}">
    
                            <label class="form-label label-1 text-capitalize">relationshipState</label>
                            <input type="text"class="form-control" name="relationshipState" value="{{$item->relationshipState}}">
    
                            <label class="form-label label-1 text-capitalize">Chronic diseases</label>
                            <input type="text" class="form-control"name="diseases" value="{{$item->diseases}}">
    
                            <label class="form-label label-1 text-capitalize"> bloodType</label>
                            <input type="text"class="form-control" name="bloodType" value="{{$item->bloodType}}">
    
                             <input type="submit" class="btn btn-success" value="edit">
    
                            </form>  
                            @endforeach

                        @endif

 
                        </div>
                    </form>
                </div>

                {{-- @endforeach --}}

           





                <!--Medical history cards -->
                <div class="row gx-2">
                    <h3 class="fs-2 mb-0 text-capitalize mb-3">Medical history</h3>
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm rounded-5 p-3">
                            <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                            <ul class="list-unstyled mt-3">
                                <li class="mb-2">
                                    <strong>doctor name:</strong><span class="ms-2">ahmed eldeep</span>
                                </li>
                                <li class="mb-2">
                                    <strong>analysis center:</strong><span class="ms-2">type analysis center</span>
                                </li>
                                <li class="mb-2">
                                    <strong>for:</strong><span class="ms-2">X-ray of the heart</span>
                                </li>
                                <li class="mb-2">
                                    <strong>Comment:</strong><span class="d-block">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Illum aliquid a dolor, quae pariatur nemo
                                        voluptatibus sunt dicta labore laborum aut necessitatibus aliquam cumque culpa
                                        ipsum. Libero blanditiis doloribus corrupti?</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm rounded-5 p-3">
                            <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                            <ul class="list-unstyled mt-3">
                                <li class="mb-2">
                                    <strong>doctor name:</strong><span class="ms-2">ahmed eldeep</span>
                                </li>
                                <li class="mb-2">
                                    <strong>analysis center:</strong><span class="ms-2">type analysis center</span>
                                </li>
                                <li class="mb-2">
                                    <strong>for:</strong><span class="ms-2">X-ray of the heart</span>
                                </li>
                                <li class="mb-2">
                                    <strong>Comment:</strong><span class="d-block">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Illum aliquid a dolor, quae pariatur nemo
                                        voluptatibus sunt dicta labore laborum aut necessitatibus aliquam cumque culpa
                                        ipsum. Libero blanditiis doloribus corrupti?</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="py-4 text-center m-auto">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#medical_history">
                        add medical history
                    </button>
                </div>

            </div>
        </div>
    </main>

    <!-- Medical history modal form -->
    <div class="modal fade" id="medical_history" tabindex="-1" aria-labelledby="medical_history" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4 class="mb-0 text-capitalize">medical history</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="mt-3 row" id="form_medical_history">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label label-1 text-capitalize">doctor name</label>
                            <input type="text" class="form-control" placeholder="enter doctor name">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label label-1 text-capitalize">Analysis center</label>
                            <input type="text" class="form-control" placeholder="enter Analysis center">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label label-1 text-capitalize">for:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload file</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label label-1 text-capitalize">comment</label>
                            <textarea class="form-control message" placeholder="enter your comment" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="form_medical_history">submit</button>
                </div>

            </div>
        </div>
    </div>


    <!-- register doctor modal -->
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
                            <a href="#" class="text-dark d-block" data-bs-toggle="modal"
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


  @endsection