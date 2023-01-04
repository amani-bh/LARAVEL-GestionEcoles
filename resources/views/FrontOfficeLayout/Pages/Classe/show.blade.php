@include('Shared.header')
<div class="card px-2 py-2 ml-8 mt-4 mx-auto" style="width: 30rem;">
    <h4 style="padding-top: 10px; padding-bottom: 10px">Details du classe:</h4>
    <div class="card-content">
        <div class="content">

            <div class="modal-body">
                <div class="rating">
                    @for($i=1;$i<=number_format($rating_value);$i++)
                        <i class="fa fa-star checked"></i>
                    @endfor
                    @for($j=number_format($rating_value);$j<5;$j++)
                        <i class="fa fa-star "></i>
                    @endfor
                    <span>  {{number_format($rating_value)}}/5 Rating</span>
                </div>
                <div class="form-group">
                    <label for="nom">Nom du Classe</label>
                    <input type="text" class="form-control" id="nom"
                           name="nom" value="{{$class->nom}}" disabled>
                </div>
                <div class="form-group">
                    <label for="max_capacity">max_capacity</label>
                    <input type="text" class="form-control" id="max_capacity"
                           name="max_capacity" value="{{$class->max_capacity}}" disabled>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type"
                           name="type" value="{{$class->type}}" disabled>
                </div>
            </div>

            <form action="{{url('/add-rating')}}" method="post">
                @csrf
                <input type="hidden" name="class_id" value="{{$class->id}}">
                <div class="rating-css">
                    <div class="star-icon">
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>

                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Rate</button>
                <a href="{{ url()->previous() }}" class="btn btn-outline-warning "><i class="bi bi-arrow-up-short">
                        cancel</i></a>
            </form>

        </div>
    </div>


</div>
