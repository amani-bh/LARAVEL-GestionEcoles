@include('Shared.header')
<div class="card px-2 py-2 ml-5 mt-4 mb-5 mx-auto" style="width: 40rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Details de l'évènement:</h4>
    <div class="card-content">
        <div class="content">
            <div class="form-group">
                <label for="titre_event">Titre</label>
                <input type="text" class="form-control"
                       name="titre_event" value="{{$evenement->titre_event}}" disabled>
            </div>
            <div class="form-group">
                <label for="date_debut">Date début</label>
                <input type="text" class="form-control"
                       name="date_debut" value="{{$evenement->date_debut}}" disabled>
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="text" class="form-control"
                       name="date_fin" value="{{$evenement->date_fin}}" disabled>
            </div>
            <div class="form-group">
                <label for="place">Place</label>
                <input type="text" class="form-control"
                       name="place" value="{{$evenement->place}}" disabled>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="4"
                       name="description" disabled>
                    {{$evenement->description}}
                </textarea>

            </div>
            <div class="form-group">
                <label for="createur">Createur</label>
                <input type="text" class="form-control"
                       name="createur" value="{{$evenement->createur}}" disabled>
            </div>
        </div>
    </div>
</div>
