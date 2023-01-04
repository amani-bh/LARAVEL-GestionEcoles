@include('Shared.header')
<div class="card px-2 py-2 ml-5 mt-4 mx-auto" style="width: 20rem;">
    <div class="card-content">
        <div class="content">
            <form method="post" action="{{route('classes.update', $class)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nom">Nom du Club</label>
                    <input type="text" class="form-control" id="nom"
                           name="nom" value="{{old('nom',$class->nom)}}">

                </div>
                <div class="form-group">
                    <label for="type">max_capacity</label>
                    <input type="int" class="form-control" id="max-capacity"
                           name="max_capacity" value="{{old('max_capacity', $class->max_capacity)}}">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type"
                           name="type" value="{{old('type', $class->type)}}">
                </div>
                <div class="form-group">
                    <label for="type">Niveau</label>
                    <input type="text" class="form-control" id="niveau"
                           name="niveau" value="{{old('niveau', $class->niveau)}}">
                </div>
                <button type="submit" class="btn btn-outline-primary">Modifier</button>
                <a href="{{ url()->previous() }}" class="btn btn-outline-warning "><i class="bi bi-arrow-up-short">Go Back</i></a>

            </form>

        </div>
    </div>
</div>
