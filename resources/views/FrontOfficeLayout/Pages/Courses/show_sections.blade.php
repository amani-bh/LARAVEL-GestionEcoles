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
 <!-- Contact Start -->
 <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Course</h5>
            <h1>Sections</h1>
        </div>
        <div class=" ">
            @foreach($list as $section)
            <h2 class="text-center">{{$section->name}}</h2>
            <h4>Details: </h4>
            <p>{{$section->details}}</p>
            <iframe src ="{{Vite::asset("storage/app/"."".$section->file)}}" width="1000px" height="600px"></iframe>
          
          <hr class="solid">
    @endforeach

        </div>
      
    </div>
</div>
<!-- Contact End -->
@include('Shared.footer')