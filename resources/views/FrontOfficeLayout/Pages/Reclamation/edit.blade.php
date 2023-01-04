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
<div class="container py-5">
    <div class="text-center mb-5">
        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Réclamation</h5>
        <h1>Réclamation</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="contact-form bg-secondary rounded p-5">
                <div id="success"></div>
                <div class="bg-secondary rounded p-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Modifier réclamation</h3>
                    <div class="content">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="post" action="{{ route('reclamationadmin.update',$reclamation->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="titre" value="{{old('titre',$reclamation->titre)}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Déscription</label>
                                    <textarea style="height: 188px;"  class="form-control" name="description">{{old('description',$reclamation->description)}}</textarea>
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary ">Modifier</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Shared.footer')

</body>

</html>
