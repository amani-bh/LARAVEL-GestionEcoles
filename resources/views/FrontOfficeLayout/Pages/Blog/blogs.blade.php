@include('Shared.header')
<div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Blogs</h3>
            <div class="d-inline-flex text-white">
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Blog</p>
            </div>
        </div>
    </div>
</div>
<form action="" style="float: right; display:flex; margin-right:58px;
  clear: both;">
              <input type="text" name="search" class="form-control mx-1" placeholder="Search"  aria-label="search" value="{{$search}}" >
              <button  class="btn btn-primary mx-1" ><i class="fa fa-search" aria-hidden="true"></i></button>

</form>
    <div class="container-fluid py-5">

        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Espace Blogging</h5>
                <h1>Vos blogs</h1>

            </div>
            <div class="col-lg-12 mt-5 mt-lg-0">
                <!-- Tag Cloud -->
                <div class="mb-5 ">
                    <div class="d-flex flex-wrap m-n1 justify-content-md-center">
                        <a href="{{route('blog.create')}}" class="btn btn-outline-primary m-1">Ajouter un blog</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row pb-4">
                         @foreach($listBlogs as $blog)
                        <div class="col-lg-4 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                               <img class="img-fluid" src="{{Vite::asset("resources/assets/img/blog-1.jpg")}}" alt="">
                                <a class="blog-overlay text-decoration-none" href="{{route('blog.show', $blog->id)}}">
                                    <h5 class="text-white mb-3">{{$blog->titre}}</h5>
                                    <p class="text-primary m-0"> {{$blog->description}}</p>
                                </a>
                                @if ($blog->user->id === $connectedUserId)
                              <div
                                class="d-flex"
                                style="line-height: 12px;
                                    font-size: 12pt;
                                    font-family: tahoma;
                                    margin-top: 1px;
                                    margin-right: 20px;
                                    position: absolute;
                                    bottom: 75px;
                                    right: 0;
                                    z-index: 9999999;"
                                >
                                <a type="submit"  href="{{route('blog.edit', $blog->id)}}"><i class="fa fa-pen text-primary mr-2"></i></a></a>
                                <form action="{{route('blog.destroy', $blog->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style=" background-color: Transparent;
                                        background-repeat:no-repeat;
                                        border: none;
                                        cursor:pointer;">
                                    <i class="fa fa-trash text-primary mr-2"></i></button>
                                </form>
                                </div>
                                    @endif
                            </div>
                        </div>
                           @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
<!-- <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-3">
                    @foreach($listBlogs as $blog)
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="{{Vite::asset("resources/assets/img/blog-1.jpg")}}" alt="">
                                <a class="blog-overlay text-decoration-none" href="{{route('blog.show', $blog->id)}}">
                                    <h5 class="text-white mb-3">{{$blog->titre}}</h5>

                                    <p >
                                        <a type="submit" class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{route('blog.edit', $blog->id)}}">Modifier</a>
                                            <form action="{{route('blog.destroy', $blog->id)}}" method="post">
                                                @csrf
                                                @method('post')
                                                <button class="btn btn-primary py-2 px-4 m-auto d-none d-lg-block" style="background-color: darkred">Supprimer</button>
                                            </form>
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- @foreach($listBlogs as $blog)
    <tr>
        <td>{{$blog->titre}}</td>
        <td>{{$blog->description}}</td>
        @if ($blog->user->id === $connectedUserId)
        <td>
            <a type="submit" class="btn btn-warning" href="{{route('blog.edit', $blog->id)}}">Modifier</a>
            <form action="{{route('blog.destroy', $blog->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                <a type="submit" class="btn btn-primary" href="{{route('blog.show', $blog->id)}}">Details</a>
            </form>
        </td>
        @endif
    </tr>
    @endforeach -->

    @include('Shared.footer')

    </body>

    </html>
