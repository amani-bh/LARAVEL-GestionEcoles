@include('Shared.header')
<div class="container py-5">
    <div class="text-center mb-5">
        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Blog</h5>
        <h1>Espace de Blogging</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="contact-form bg-secondary rounded p-5">
                <div id="success"></div>
                <div class="bg-secondary rounded p-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Modifier Blog</h3>
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
                        <form method="post" action="{{ route('blog.update',$blog->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" name="titre" value="{{old('titre',$blog->titre)}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Déscription</label>
                                <textarea class="form-control" name="description" >{{old('description',$blog->description)}}</textarea>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Modifier</button>
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
