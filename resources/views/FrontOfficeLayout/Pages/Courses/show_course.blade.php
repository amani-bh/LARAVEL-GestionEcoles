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
        {{-- <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Course</h5>
            <h1>{{$cours->title}}</h1>
        </div> --}}
        <div class="row justify-content">
          <img src="{{Vite::asset("storage/app/courseImage/"."".$cours->courseImage)}}" width="400px" height="300px"/><br>
         <div>
            <h1 class="ml-5">{{$cours->title}}</h1>
            <p class="ml-5">{{$cours->details}}</p>
            <h4 class="ml-5">Description:</h4>
            <p class="ml-5">{{$cours->description}}</p>
        </div>
         </div>
          
        </div>
    </div>
    
</div>
        <a class=" show_section btn btn-primary py-2 px-4  d-none d-lg-inline mb-5 mt-5" href="{{route('show_section.show', $cours->id)}}">View Sections</a>

    </div>
     
    
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">


     <!-- Comment List -->
     <div class="mb-5">
        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">{{count($listCommentaires)}} Comments</h3>
    @foreach($listCommentaires as $commentaire)

        <div class="media mb-4">
            <img src="{{Vite::asset("resources/assets/img/user.png")}}" alt="Image" class=" rounded-circle mr-3 mt-1"
                style="width: 45px;" >
            <div class="media-body">
                <h6>{{$commentaire->user->name}} <small><i>{{$commentaire->created_at}}</i></small></h6>
                <p>{{$commentaire->commentaire}}</p>
            </div>
        </div>
    @endforeach

    </div>

    <!-- Comment Form -->
    <div class="bg-secondary rounded p-5">
        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h3>
        <form method="post" action="{{ route('commentaires.store') }}">
            @csrf
            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" cols="30" rows="5" class="form-control border-0" id="commentaire" name="commentaire"></textarea>
            </div>
            <input  type="hidden" name="cours_id" value="{{$cours->id}}">
            <div class="form-group mb-0">
                <input type="submit" value="Leave Comment" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">
            </div>
        </form>
    </div>


</div>
</div>
</div>
</div>

</div>
<!-- Contact End -->
@include('Shared.footer')
