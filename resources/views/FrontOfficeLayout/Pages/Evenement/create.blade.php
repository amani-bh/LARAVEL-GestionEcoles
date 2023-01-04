@include('Shared.header')
<div class="card px-2 py-2 ml-5 mt-4 mb-5 mx-auto" style="width: 40rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Ajouter un évènement:</h4>
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
            <form method="post" action="{{route('evenements.index')}}" >
                @csrf
                <div class="form-group">
                    <label for="titre_event">Titre</label>
                    <input type="text" class="form-control"
                       name="titre_event">
                </div>
                <div class="form-group">
                    <label for="date_debut">Date début</label>
                    <input type="text" class="form-control"
                       name="date_debut">
                </div>
                <div class="form-group">
                    <label for="date_fin">Date de fin</label>
                    <input type="text" class="form-control"
                       name="date_fin">
                </div>
                <div class="form-group">
                    <label for="place">Place</label>
                    <input type="text" class="form-control"
                       name="place">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="4"
                          name="description">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="createur">Createur</label>
                    <input type="text" class="form-control"
                       name="createur">
                </div>
                <button type="submit" class="btn btn-primary">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
</div>
