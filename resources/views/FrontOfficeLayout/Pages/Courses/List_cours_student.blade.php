@include('Shared.header')

<div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Courses</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/home') }}">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Courses</p>
            </div>
        </div>
    </div>
</div>

    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
                <h1>All Courses</h1>
            </div>
            {{-- <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-inline mb-5" href="{{ url('/add_course') }}">Add course</a> --}}

            <div class="row">
    @foreach($listCours as $cours)

                <div class="col-lg-3 col-md-5 mb-4">
                    <div class="rounded overflow-hidden mb-2">
                        <img class="img-fluid" src="{{Vite::asset("storage/app/courseImage/"."".$cours->courseImage)}}" alt="">
                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25 Students</small>
                                <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>{{$cours->duree}}h</small>
                            </div>
                            <a class="h5" href="{{route('cours_teacher.show', $cours->id)}}">{{$cours->title}}</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{$cours->user->name}}</h6>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach

            </div>
        </div>
    </div>
    <!-- Courses End -->
    @include('Shared.footer')