@include('Shared.header')
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
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Ajouter réclamation</h3>
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
                        <form method="post" action="{{ route('reclamationadmin.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre </label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="form-group">
                                <label for="description">Déscription</label>
                                <textarea style="height : 188px" class="form-control" name="description" ></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit" >Ajouter</button>
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
