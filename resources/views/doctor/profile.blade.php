{{--
<h3>Welcome to Doctor Profile</h3>

Doctor Id : {{$doc->id}} <br>
Doctor name :  {{$doc->name}} <br>
Doctor email : {{$doc->email}}<br>
Doctor address : {{$doc->address}}<br>

<div class="card" style="width: 18rem;">

<img src="{{URL::asset($doc->photo)}}" alt="{{$doc->photo}}" class="img-tumbnail" width="200" height="200">

</div>

<br>

<form action="{{url('/doctor/editProfile/'.$doc->id)}}" method="get">
@csrf
    <input type="submit" value="Edit Profile ">
</form>





<h1>________________________</h1>



<form action="{{url('showAddLocation')}}" method="get">
@csrf
    <input type="submit" value="Add clinic location">
</form>







<h1>________________________</h1>


<h1>Mwa3ed el 3mal</h1>

@foreach ($doctorTime as $item)

Doc Day : {{$item->name}} <br>
Start at : {{$item->start}} <br>
End at : {{$item->end}} <br>

<form action="{{url('/editWorkingTimePage/'.$item->id)}}" method="get">
@csrf
    <input type="submit" value="Edit">
</form>


<form action="{{url('/deleteWorkingTime/'.$item->id)}}" method="post">
<!-- @method('DELETE') -->
@csrf
    <input type="submit" value="Delete">
</form>





<h1>____________</h1>
@endforeach



    <h1>________________________</h1>


<form action="{{url('showWorkingTimePage')}}" method="get">
@csrf
    <input type="submit" value="Set Working Time ">
</form>
<h1>________________________</h1> --}}


@extends('layouts.fixed')
@section('content')

    <nav class="navbar navbar-expand-md navbar-light bg-wihte">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src={{asset('assets/img/logo.png')}} class="logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/doctorHome')}}">home</a>
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
                <form action="{{url('logout')}}" method="post">
                    @csrf
                    <div class="logout ms-auto">
                        <button class="btn btn-danger">logout</button>
                    </div>
               </form>
            </div>
        </div>
    </nav>


    <div class="profile container py-5">
        <h4 class="h4">Profile</h4>
        <div class="row gx-5 mt-4">
            <div class="col-md-4 text-center">

                <img src="{{URL::asset($doc->photo)}}"  class="rounded-circle" alt="">

                <div class="mt-3">
                    <button class="btn btn-light" id="edit_doctor">edit</button>
                    <div id="info_doctor">
                        <h6 class="mb-2 fs-5 text-capitalize mt-2"><small>doctor:</small> {{$doc->name}}</h6>
                        <p class="text-capitalize fs-5">
                            <i class="fa-solid fa-stethoscope mt-2"></i> {{$doc->speciality}}
                        </p>
                    </div>
                    <form class="d-none mt-3" id="form_doctor">
                        <div class="mb-3">
                            <input type="text" class="form-control" value="ahmed eldeep" placeholder="doctor name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-stethoscope mt-2"></i></span>
                            <select class="form-select">
                                <option selected>dendist</option>
                                <option value="Professor">test</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">save edit</button>
                        <button class="btn btn-outline-danger" id="cancel_edit_doctor" type="button">cancel
                            edit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-7 ms-auto">
                <div class="head d-flex justify-content-between">
                    <h4 class="h5 text-capitalize ">about</h4>
                    <button class="btn btn-link" id="edit_about"><i class="fa-solid fa-pen mt-2"></i></button>
                </div>
                <div class="body mt-2" id="about">
                    <p class="text-2 lead">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate libero velit, repellat
                        hic ex tempora sint mollitia magnam dolor, repellendus earum dolorum alias. Nesciunt sint iure
                        quam ipsam officiis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate
                        libero velit, repellat
                        hic ex tempora sint mollitia magnam dolor, repellendus earum dolorum alias. Nesciunt sint iure
                        quam ipsam officiis!
                    </p>

                </div>
                <form action="" class="d-none" id="form_about">
                    <textarea class="form-control" cols="30" rows="10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate libero velit, repellat hic ex tempora sint mollitia magnam dolor, repellendus earum dolorum alias. Nesciunt sint iure quam ipsam officiis!
                    </textarea>
                    <button class="btn btn-success mt-3" type="submit">save edit</button>
                    <button class="btn btn-outline-danger mt-3" id="cancel_edit_about" type="button">cancel
                        edit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <h4 class="fs-2 text-capitalize">certificates</h4>
        <div class="upload_img mt-3 m-auto rounded-5 ">
            <input type="file" name="image" id="file_upload">
            <span class="bg-light text-center py-4">
                <i class="fa-solid fa-add fs-1 text-wite"></i>
            </span>
        </div>
        <div class="row g-3 mt-4">
            <div class="col-sm-6 col-md-4">
                <img src={{asset('assets/img/logo.png')}} alt="">
            </div>
            <div class="col-sm-6 col-md-4">
                <img src={{asset('assets/img/logo.png')}} alt="">
            </div>
            <div class="col-sm-6 col-md-4">
                <img src={{asset('assets/img/logo.png')}} alt="">
            </div>
        </div>
    </div>

    <section class="more_info py-5">
        <div class="container">
            <div class="head d-flex justify-content-between">
                <h4 class="fs-2 text-capitalize">more info</h4>
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#more_info_doctor">edit</button>
            </div>
            <div class="row g-1 mt-3">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">title:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- Professor</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">country:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- egypt</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">Graduation Year:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- 2004</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">university:</h5>

                    </div>
                    <p class="fw-5000 fs-5">- cairo university</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">degree:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- dendist doctorate</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">worked at:</h5>
                    </div>
                    <p class=" fw-5000 fs-5 mb-0">- salah salim hospital</p>
                    <p class="fw-light text-capitalize text-2">form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">spoken languages:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- arabic</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">Governorate :</h5>
                    </div>
                    <p class="fw-5000 fs-5">- arabic</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">City:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- arabic</p>
                </div>
            </div>
        </div>
    </section>

    <section class="clinic_info py-5">
        <div class="container">
            <div class="head d-flex justify-content-between">
                <h4 class="fs-2 text-capitalize">clinic info</h4>
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#clinic_info">edit</button>
            </div>

            <div class="swiper mt-4 slider">
                <h4>clinic pictures</h4>
                <div class="swiper-wrapper mt-4">
                    <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#modal_slider">
                        <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                    </div>
                    <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#modal_slider">
                        <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                    </div>
                    <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#modal_slider">
                        <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                    </div>
                    <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#modal_slider">
                        <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                    </div>
                    <div class="swiper-slide" data-bs-toggle="modal" data-bs-target="#modal_slider">
                        <img src={{asset('assets/img/clinic.jpeg')}} alt="">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="row g-1 mt-4">
                <h4>Clinic working hours </h4>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">saturday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">sunday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">monday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">tuesday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">wednesday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">thursday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">friday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
            </div>
            <div class="row mt-4">
                <h4>Address and price of detection</h4>
                <div class="col-12 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">Clinic address:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- Abu Kabir Sharqieh, Sabri Sharif Street</p>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">Detection price:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- 300 pound</p>
                </div>


            </div>
            <iframe class="mt-4" id="map" src="" width="100%" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>

    {{-- <section class="video_time pb-5">
        <div class="container">
            <div class="head d-flex justify-content-between">
                <h4 class="fs-2 text-capitalize">video call time</h4>
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#dates_video">edit</button>
            </div>
            <div class="row g-2 mt-2">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">saturday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">sunday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">monday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">tuesday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">wednesday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">thursday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="h5 mb-0 text-primary text-capitalize">friday:</h5>
                    </div>
                    <p class="fw-5000 fs-5">- form 2008 to 2010</p>
                </div>
            </div>
        </div>
    </section> --}}



    <!-- modal edite more info doctor -->
    <div class="modal fade" id="more_info_doctor" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class="mb-0 text-capitalize">Add doctor information</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="">
                        <div class="form-floating mb-3">
                            <select class="form-select">
                                <option selected>Professor</option>
                            </select>
                            <label>Title</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" list="country" placeholder="country">
                            <datalist id="country">
                                <option value="San Francisco">
                                <option value="New York">
                                <option value="Seattle">
                                <option value="Los Angeles">
                                <option value="Chicago">
                            </datalist>
                            <label for="country">country</label>
                        </div>
                        <div class="row g-3 py-3">
                            <div class="col-md-6 pe-md-1">
                                <div class="form-floating">
                                    <input class="form-control" list="governorate" placeholder="governorate">
                                    <datalist id="governorate">
                                        <option value="San Francisco">
                                        <option value="New York">
                                        <option value="Seattle">
                                        <option value="Los Angeles">
                                        <option value="Chicago">
                                    </datalist>
                                    <label for="governorate">governorate</label>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-1">
                                <div class="form-floating">
                                    <input class="form-control" list="city" placeholder="city">
                                    <datalist id="city">
                                        <option value="San Francisco">
                                        <option value="New York">
                                        <option value="Seattle">
                                        <option value="Los Angeles">
                                        <option value="Chicago">
                                    </datalist>
                                    <label for="city">city</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="University">
                            <label>University</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Graduation Year">
                            <label>Graduation Year</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Degree">
                            <label>Degree</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" placeholder="worked at">
                            <label>worked at</label>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <select class="form-select">
                                    <option value="1961" selected>1961</option>
                                    <option value="1962">1962</option>
                                    <option value="1963">1963</option>
                                </select>
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <select class="form-select">
                                    <option value="1962" selected>1962</option>
                                    <option value="1963">1963</option>
                                    <option value="1963">1963</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select">
                                <option value="ar" selected>ar</option>
                                <option value="en">en</option>
                                <option value="fr">fr</option>
                            </select>
                            <label>Spoken Languages</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="phone">
                            <label>Phone</label>
                        </div>
                        <button class="btn btn-primary btn-lg w-100">submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- modal edite clinic info -->
    <div class="modal fade" id="clinic_info" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class="mb-0 text-capitalize">Add clinic information</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="form_clinic_info">
                        <div class="upload_img my-3 m-auto rounded-circle">
                            <input type="file" name="image" id="file_upload" multiple>
                            <span class="bg-light text-center py-4">
                                <i class="fa-solid fa-camera fs-1 text-wite"></i>
                                <p>add photo clinic</p>
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Clinic address">
                            <label>Clinic address</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="lat" id="lat" hidden>
                            <input type="text" name="long" id="long" hidden>
                            <button class="btn btn-light btn-lg w-100 mb-3" type="button" id="get_location_btn">get
                                location</button>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Detection price(eg)">
                            <label>Detection price(eg)</label>
                        </div>
                        <h5 class="fs-5 text-capitalize">select day</h5>
                        <input type="checkbox" class="btn-check" id="saturday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="saturday">saturday</label>

                        <input type="checkbox" class="btn-check" id="sunday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="sunday">sunday</label>

                        <input type="checkbox" class="btn-check" id="monday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="monday">monday</label>

                        <input type="checkbox" class="btn-check" id="tuesday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="tuesday">tuesday</label>

                        <input type="checkbox" class="btn-check" id="wednesday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="wednesday">wednesday</label>

                        <input type="checkbox" class="btn-check" id="thursday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="thursday">thursday</label>

                        <input type="checkbox" class="btn-check" id="friday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="friday">friday</label>

                        <div class="saturday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">saturday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="sunday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">sunday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="monday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">monday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="tuesday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">tuesday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="wednesday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">wednesday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="thursday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">thursday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="friday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">friday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="form_clinic_info">submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edite dates video -->
    {{-- <div class="modal fade" id="dates_video" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class="mb-0">Choose the dates of the video call</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="form_dates_video">
                        <h5 class="fs-5 text-capitalize">select day</h5>
                        <input type="checkbox" class="btn-check" id="vd_saturday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_saturday">saturday</label>

                        <input type="checkbox" class="btn-check" id="vd_sunday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_sunday">sunday</label>

                        <input type="checkbox" class="btn-check" id="vd_monday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_monday">monday</label>

                        <input type="checkbox" class="btn-check" id="vd_tuesday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_tuesday">tuesday</label>

                        <input type="checkbox" class="btn-check" id="vd_wednesday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_wednesday">wednesday</label>

                        <input type="checkbox" class="btn-check" id="vd_thursday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_thursday">thursday</label>

                        <input type="checkbox" class="btn-check" id="vd_friday" autocomplete="off">
                        <label class="btn btn-outline-success mb-2" for="vd_friday">friday</label>

                        <div class="saturday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">saturday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="sunday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">sunday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="monday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">monday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="tuesday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">tuesday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="wednesday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">wednesday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="thursday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">thursday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class="friday d-none mt-3">
                            <label class="form-label mb-1 fw-500 fs-6">friday</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                                <span class="input-group-text bg-transparent border-0 fw-bold">to</span>
                                <input type="time" class="form-control">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="form_dates_video">submit</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- modal register patient -->
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
