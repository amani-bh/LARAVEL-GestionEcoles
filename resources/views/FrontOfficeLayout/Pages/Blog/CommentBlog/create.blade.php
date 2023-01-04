<div class="contact-form bg-secondary rounded p-5">
    <div id="success"></div>
    <div class="bg-secondary rounded p-3">
        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Ajouter un commentaire</h3>
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
            <form method="post" action="{{ route('addcommentblog',$blog->id) }}">
                @csrf
                <div class="form-group">

                    <textarea  class="form-control" name="contenu" ></textarea>
                </div>
                <div class="form-group">
                    {!! NoCaptcha::renderJs('fr', false) !!}
                    {!! NoCaptcha::display() !!}
                </div>
                <div class="text-center">
                    <button class="btn btn-primary py-3 px-5" type="submit" >Ajouter</button>
                </div>
            </form>

        </div>
    </div>
</div>
<hr/>
