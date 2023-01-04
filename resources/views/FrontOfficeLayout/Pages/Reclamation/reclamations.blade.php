@include('Shared.header')

<div class="container-fluid page-header2" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Reclamations</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Reclamation</p>
            </div>
        </div>
    </div>
</div>
<!-- Courses Start -->
<form action="" style="float: right; display:flex; margin-right:58px;
  clear: both;">
              <input type="text" name="search" class="form-control mx-1" placeholder="Search"  aria-label="search" value="{{$search}}" >
              <button class="btn btn-primary mx-1" ><i class="fa fa-search" aria-hidden="true"></i></button>

</form>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Espace Réclamation</h5>
            <h1>Vos réclamation</h1>

        </div>
        <div class="col-lg-12 mt-5 mt-lg-0">
            <!-- Tag Cloud -->
            <div class="mb-5 ">
                <div class="d-flex flex-wrap m-n1 justify-content-md-center">
                    <a href="{{route('reclamationadmin.create')}}" class="btn btn-outline-primary m-1">Ajouter une réclamation</a>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($listReclamation as $reclamation)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="rounded overflow-hidden mb-2">
                    <img class="img-fluid" src="{{Vite::asset("resources/assets/img/rec.jpeg")}}" alt="">
                    <div class="bg-secondary p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-archive text-primary mr-2"></i>Titre de la réclamation :</small>
                        </div>
                        <a class="h5" href="{{route('clientshow', $reclamation->id)}}">{{$reclamation->titre}}</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0">
                                    <i class="fa fa-comments text-primary mr-2"></i>Reclamation
                                    </h6>
                                <h5 class="m-0">
                                    <a type="submit" href="{{route('reclamationadmin.edit', $reclamation->id)}}"><i class="fa fa-pen text-primary mr-2"></i></a>
                                    <form action="{{route('destroyclient', $reclamation->id)}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('post')
                                        <button style=" background-color: Transparent;
                                        background-repeat:no-repeat;
                                        border: none;
                                        cursor:pointer;" type="submit" ><i class="fa fa-trash text-primary mr-2"></i></button>
                                    </form>
                                </h5>
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


{{--<a class="btn btn-success" href="{{route('reclamationadmin.create')}}">Ajouter</a>
<br>
@foreach($listReclamation as $reclamation)
    <tr>
        <td>{{$reclamation->titre}}</td>
        <td>{{$reclamation->description}}</td>
        <td>
            <a type="submit" class="btn btn-warning" href="{{route('reclamationadmin.edit', $reclamation->id)}}">Modifier</a>
            <form action="{{route('destroyclient', $reclamation->id)}}" method="post">
                @csrf
                @method('post')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach--}}

@include('Shared.footer')

</body>

</html>
