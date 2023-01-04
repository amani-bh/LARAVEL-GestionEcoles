@include('Shared.header')
<div class="card px-2 py-2 ml-5 mt-4 mx-auto" style="width: 30rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Ajouter un club:</h4>
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
            <form method="post" action="{{ route('clubs.index') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom du Club</label>
                    <input type="text" class="form-control" id="nom"
                           name="nom">

                    <label for="fondateur">Fondateur</label>
                    <input type="text" class="form-control" id="fondateur"
                           name="fondateur">

                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type"
                           name="type">
                </div>
                <div class="form-group">
                    <label for="date_creation">Date de Creation</label>
                    <input type="text" class="form-control" id="date_creation"
                           name="date_creation">
                </div>

                <button type="submit" class="btn btn-primary">ADD</button>
            </form>

        </div>
    </div>
</div>
<!--
<script>
    var cardWidth = (document.getElementById("cardc").offsetWidth);
    document.getElementById("cardc").style.width = cardWidth * 0.4 + "px";
</script>
-->
</body>
</html>
@include('Shared.footer')
