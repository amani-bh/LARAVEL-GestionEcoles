@include('Shared.header')
<div class="card px-2 py-2 ml-5 mt-4 mx-auto" style="width: 30rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Details du club:</h4>
    <div class="card-content">
        <div class="content">
                <div class="form-group">
                    <label for="nom">Nom du Club</label>
                    <input type="text" class="form-control" id="nom"
                           name="nom" value="{{$club->nom}}" disabled>
                </div>
                <div class="form-group">
                    <label for="fondateur">Fondateur</label>
                    <input type="text" class="form-control" id="fondateur"
                           name="fondateur" value="{{$club->fondateur}}" disabled>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type"
                           name="type" value="{{$club->type}}" disabled>
                </div>
                <div class="form-group">
                    <label for="dateCreation">Date de Creation</label>
                    <input type="text" class="form-control" id="dateCreation"
                           name="date_creation" value="{{$club->date_creation}}" disabled>
                </div>
        </div>
    </div>

</div>

