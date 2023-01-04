@include('Shared.header')
<div class="container py-5">
    <div class="text-center mb-5">
        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Commentaire</h5>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="contact-form bg-secondary rounded p-5">
                <div id="success"></div>
                <div class="bg-secondary rounded p-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Modifier commentaire</h3>
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
                        <form method="post" action="{{ route('commentblog.update',$comment->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="contenu">Contenu</label>
                                <textarea class="form-control" name="contenu" >{{old('contenu',$comment->contenu)}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
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
