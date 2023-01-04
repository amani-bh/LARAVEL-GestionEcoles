<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ECOURSES</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link src="{{Vite::asset("resources/assets/img/favicon.ico")}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    @vite(["resources/assets/lib/owlcarousel/assets/owl.carousel.min.css"])

    <!-- Customized Bootstrap Stylesheet -->
    @vite(["resources/assets/css/style.css"])
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>


<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center py-4 px-xl-5">
        <div class="col-lg-3">
            <a href="" class="text-decoration-none">
                <h1 class="m-0"><span class="text-primary">E</span>SCHOOL</h1>
            </a>
        </div>
        <div class="col-lg-3 text-right">
            <div class="d-inline-flex align-items-center">
                <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                <div class="text-left">
                    <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                    <small>123 Street, New York, USA</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-right">
            <div class="d-inline-flex align-items-center">
                <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                <div class="text-left">
                    <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                    <small>info@example.com</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-right">
            <div class="d-inline-flex align-items-center">
                <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                <div class="text-left">
                    <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                    <small>+012 345 6789</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
                <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Subjects</h5>
                <i class="fa fa-angle-down text-primary"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Web Design <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="" class="dropdown-item">HTML</a>
                            <a href="" class="dropdown-item">CSS</a>
                            <a href="" class="dropdown-item">jQuery</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link">Apps Design</a>
                    <a href="" class="nav-item nav-link">Marketing</a>
                    <a href="" class="nav-item nav-link">Research</a>
                    <a href="" class="nav-item nav-link">SEO</a>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">

                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="{{ url('/home') }}" class="nav-item nav-link {{ (request()->is('home')) ? 'active' : '' }}">Home</a>
                        <a href="{{url('/detailetablissement')}}" class="nav-item nav-link" {{ (request()->is('clubs')) ? 'active' : '' }}>Etablissement</a>
                        @if(Auth::user()->user_type =='teacher')
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Course</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href={{ url('/cours_teacher') }}  class="dropdown-item">Your Course List</a>
                                <a href={{ url('/add_course') }} class="dropdown-item">New Course</a>
                            </div>
                        </div>
                         @else
                         <a href="{{ url('/course') }}" class="nav-item nav-link {{ (request()->is('course')) ? 'active' : '' }}">Courses</a>

                        @endif
                        <a href="{{url('/clubs')}}" class="nav-item nav-link" {{ (request()->is('clubs')) ? 'active' : '' }}>Clubs</a>
                        <a href="{{url('/classes')}}" class="nav-item nav-link" {{(request()->is('classes'))? 'active' : ''}}>Classes</a>

                        <a href="{{url('/evenements')}}" class="nav-item nav-link" {{(request()->is('evenements'))? 'active' : '' }}">Events</a>
                        <a href="{{url('/reclamation')}}" class="nav-item nav-link" {{(request()->is('reclamation'))? 'active' : '' }}">Reclamations</a>
                        <a href="{{url('/blog')}}" class="nav-item nav-link" {{(request()->is('blog'))? 'active' : '' }}">Blogs</a>

                    </div>
                    {{-- <div class="dropdown ">
                        <button class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                          <button class="dropdown-item" type="button"> {{ __('Manage Account') }}</button>
                          <a class="dropdown-item" type="button" href="{{ route('profile.show') }}"> {{ __('Profile') }}</a>
                          <a class="dropdown-item" type="button" href="{{ route('logout') }}">{{ __('Log Out') }}</a>
                        </div>
                      </div> --}}
                    <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('profile.show') }}"><i class="fa fa-user text mr-2"></i>{{ __('Profile') }}</a>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

