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
@if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 <!-- Contact Start -->
 <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Course</h5>
            <h1>Edit Course</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-secondary rounded p-5">
                    <div id="success"></div>
                    <form  action="{{ route('cours_teacher.update', $cours->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="control-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Title" id="title"  name="title" value="{{old('title',$cours->title)}}" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Details" id="details"  name="details" value="{{old('details',$cours->details)}}"  />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="number" class="form-control border-0 p-4"  placeholder="Number of hours" id="duree"  name="duree" value="{{old('duree',$cours->duree)}}"  />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control border-0 py-3 px-4" rows="5" placeholder="Description" id="description"  name="description" value="{{old('description',$cours->description)}}" >{{$cours->description}}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-5" type="submit" >Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@include('Shared.footer')
