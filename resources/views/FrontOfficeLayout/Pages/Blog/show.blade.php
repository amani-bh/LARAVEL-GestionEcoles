@include('Shared.header')
<div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Espace Blogging</h3>
            <div class="d-inline-flex text-white">
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Blog</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <h1 class="mb-5">{{$blog->titre}}</h1>
                    <img class="rounded w-100 mb-4" src="{{Vite::asset("resources/assets/img/carousel-1.jpg")}}" alt="Image">
                    <p>{{$blog->description}}.</p>
                </div>

                <!-- Comment List -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">{{$blog->commentBlogs()->get()->count()}} Commentaires</h3>
                    @foreach($blog->commentBlogs()->get() as $comment)
                        <div class="media mb-4">
                            <img src="{{Vite::asset("resources/assets/img/userIcon.jpg")}}" alt="Image" class="rounded-circle mr-3 mt-1" style="width: 45px;">
                            <div class="media-body" style="position: relative">
                                <h6>{{$comment->user->name}} </h6>
                                <p>{{$comment->contenu}}.</p>
                                @if ($comment->user_id === $connectedUserId)
                                    <div style="display:flex;line-height: 12px;
                                    width: 73px;
                                    font-size: 8pt;
                                    margin-top: 1px;
                                    margin-right: 2px;
                                    position: absolute;
                                    top: 0;
                                    right: 0;">
                                        <a type="submit" class="btn btn-sm btn-secondary mx-2" href="{{route('commentblog.edit', $comment->id)}}"><i class="fa fa-pen "></i></a>
                                        <form action="{{route('commentblog.destroy', $comment->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash "></i></button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Comment Form -->
                @include('FrontOfficeLayout.Pages.Blog.CommentBlog.create',$blog)
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4" style="margin-top: 92px !important;">
                    <img src="{{Vite::asset("resources/assets/img/writer.jpg")}}" class="rounded-circle mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-primary mb-3">Name : {{$owner->name}}</h3>
                    <p class="text-white m-0">
                        Email : {{$owner->name}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Shared.footer')

</body>

</html>
