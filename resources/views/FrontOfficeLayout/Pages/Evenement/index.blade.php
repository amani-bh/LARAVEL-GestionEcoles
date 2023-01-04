@include('Shared.header')
<div class="container px-1 mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div style="font-weight: bolder"><h3>Evenements</h3></div>
            <div>
                <a class="btn btn-success"
                   href="{{route('evenements.create')}}">
                    Ajouter
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Place</th>
                    <th scope="col">Description</th>
                    <th scope="col">Createur</th>
                </tr>
                </thead>
                <tbody>
                @foreach($evenements as $evenement)
                    <tr>
                        <td>{{$evenement->titre_event}}</td>
                        <td>{{$evenement->date_debut}}</td>
                        <td>{{$evenement->date_fin}}</td>
                        <td>{{$evenement->place}}</td>
                        <td>{{$evenement->description}}</td>
                        <td>{{$evenement->createur}}</td>
                        <td>
                            <a type="submit" class="btn btn-warning mb-1" 
                               href="{{route('evenements.edit', $evenement->id)}}">
                                Modifier
                            </a>
                            <form action="{{route('evenements.destroy', $evenement->id)}}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger mb-1">
                                    Supprimer
                                </button>
                            </form>
                            <a type="submit" class="btn btn-primary"
                               href="{{route('evenements.show', $evenement->id)}}">
                                Afficher
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $evenements->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
<script>
  var botmanWidget = {
    aboutText: 'Write Something',
    bubbleAvatarUrl:'data:image/png;base64,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',
	title:'EVENTBOT',
    introMessage: 'Hello, I am EventBot! I am here to assist you and answer all your questions about our upcoming events!',
    mainColor:'#fc6406',
    aboutText:'',
    bubbleBackground:'#fc6406',
    headerTextColor: '#FFFF',
  };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
