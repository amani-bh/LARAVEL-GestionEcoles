@include('Shared.header')
<div class="container px-1 mt-4 mb-3">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div style="font-weight: bolder"><h3>Clubs</h3></div>
            <div>
            <a class="btn btn-success" href="{{route('clubs.create')}}">Ajouter</a>
            </div>
        </div>
    </div>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Date Creation</th>
        <th scope="col">Type</th>
        <th scope="col">Fondateur</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clubs as $club)
    <tr>
        <td>{{$club->id}}</td>
        <td>{{$club->nom}}</td>
        <td>{{$club->date_creation}}</td>
        <td>{{$club->type}}</td>
        <td>{{$club->fondateur}}</td>
        <td>
            <a type="submit" class="btn btn-warning mb-1" href="{{route('clubs.edit', $club->id)}}">Modifier</a>
            <form action="{{route('clubs.destroy', $club->id)}}" method="post">
                @csrf
                @method('delete')
            <button type="submit" class="btn btn-danger mb-1">Supprimer</button>
            </form>
            <a type="submit" class="btn btn-primary" href="{{route('clubs.show', $club->id)}}">Afficher</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
    {!! $clubs->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</div>
</div>
@include('Shared.footer')
