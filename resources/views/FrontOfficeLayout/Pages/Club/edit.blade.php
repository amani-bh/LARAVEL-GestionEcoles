@include('Shared.header')
<div class="card px-2 py-2 ml-5 mt-4 mx-auto" style="width: 30rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Modifier le club:</h4>
    <div class="card-content">
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
            <form method="post" action="{{route('clubs.update', $club)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nom">Nom du Club</label>
                    <input type="text" class="form-control" id="nom"
                           name="nom" value="{{old('nom',$club->nom)}}">

                    <label for="fondateur">Fondateur</label>
                    <input type="text" class="form-control" id="fondateur"
                           name="fondateur" value="{{old('fondateur',$club->fondateur)}}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type"
                           name="type" value="{{old('type', $club->type)}}">
                </div>
                <div class="form-group">
                    <label for="date_creation">Date de Creation</label>
                    <input type="text" class="form-control" id="dateCreation"
                           name="date_creation" value="{{old('date_creation', $club->date_creation)}}">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>
@include('Shared.footer')
