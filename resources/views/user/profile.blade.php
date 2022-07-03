{{--
user Id : {{$user->id}} <br>
user name :  {{$user->name}} <br>
user email : {{$user->email}}<br>
user address : {{$user->address}}<br>


<div class="card" style="width: 18rem;">

<img src="{{URL::asset($user->photo)}}" alt="{{$user->photo}}" class="img-tumbnail" width="100" height="200">

</div>



<form action="{{url('/user/editProfile/'.$user->id)}}" method="get">
@csrf
    <input type="submit" value="Edit Profile ">
</form> --}}



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

    <div class="container profile_patient py-5">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="nav card rounded-5 overflow-hidden flex-column nav-pills">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile"
                        role="tab" aria-controls="profile" aria-selected="true">profile</button>
                    <button class="nav-link" id="password-tab" data-bs-toggle="pill" data-bs-target="#password"
                        role="tab" aria-controls="password" aria-selected="false">change password</button>
                    <button class="nav-link" id="appointments-tab" data-bs-toggle="pill" data-bs-target="#appointments"
                        role="tab" aria-controls="appointments" aria-selected="false">my appointments</button>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- form Manage Profile -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card rounded-5 overflow-hidden">
                            <div class="card-header h6 text-center bg-primary text-white">
                                Manage Profile
                            </div>
                            <div class="card-body py-4">
                                <form action="{{url('updateProfile/'.Auth::guard('web')->user()->id)}}" method="POST">
                                   @csrf    
                                     <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="your name" value="{{Auth::guard('web')->user()->name}}">
                                        <label for="floatingInput">your name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" placeholder="enter mobile number" value="{{Auth::guard('web')->user()->email}}">
                                        <label for="floatingInput">email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" placeholder="enter mobile number" value="{{Auth::guard('web')->user()->mobile_number}}">
                                        <label for="floatingInput">mobile number</label>
                                    </div>
                                    
                                    <button class="btn btn-primary">save now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- form change password -->
                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <div class="card rounded-5 overflow-hidden">
                            <div class="card-header h6 text-center bg-primary text-white">
                                change password
                            </div>
                            <div class="card-body">
                                <form action="" class="mt-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="enter password">
                                        <label for="floatingInput">password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="mew password">
                                        <label for="floatingInput">new password</label>
                                    </div>
                                    <button class="btn btn-primary">book now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  Manage appointments -->
                    <div class="tab-pane fade" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">
                        <div class="card rounded-5 overflow-hidden">
                            <div class="card-header h6 text-center bg-primary text-white">
                                appointments
                            </div>
                            <table class="table table-hover">
                                <thead class="table-light py-4">
                                    <tr class="border-bottom py-4">
                                        <th scope="col">doctor name</th>
                                        <th scope="col">location</th>
                                        <th scope="col">appointment</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>ahmed eldeep</th>
                                        <td>Abu Kabir Sharqieh, Sabri Sharif Street</td>
                                        <td>2001 Feb 5 9:45</td>
                                        <td>
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ahmed eldeep</th>
                                        <td>Abu Kabir Sharqieh, Sabri Sharif Street</td>
                                        <td>2001 Feb 5 9:45</td>
                                        <td>
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ahmed eldeep</th>
                                        <td>Abu Kabir Sharqieh, Sabri Sharif Street</td>
                                        <td>2001 Feb 5 9:45</td>
                                        <td>
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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


    @endsection



