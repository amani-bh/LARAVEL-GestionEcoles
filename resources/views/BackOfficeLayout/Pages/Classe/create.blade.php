@include('Shared.sidebar')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="card px-2 py-2 ml-5 mt-4 mx-auto" style="width: 20rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Ajouter un classe:</h4>
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
            <form method="post" action="{{ route('back.index') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom du class</label>
                    <input type="text" class="form-control" id="nom"
                           name="nom">
                    <label for="max_capacity">Capacity</label>
                    <input type="int" class="form-control" id="max_capacity"
                           name="max_capacity">


                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type"
                           name="type">

                    <label for="niveau">Niveau</label>
                    <input type="text" class="form-control" id="niveau"
                           name="niveau">
                </div>
                <button type="submit" class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check me-25"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>Ajouter</span>
                </button>
                <button type="submit" class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check me-25"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>Cancel</span>
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
