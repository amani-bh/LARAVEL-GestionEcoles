@include('Shared.sidebar')
<div class="container-fluid py-5">
    <a class="btn btn-outline-primary" href="{{route('back.create')}}">New Classe</a>

</div>

<div class="container px-1 mt-1 mb-1">


    <table class="table table-bordered table-hover">

        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Max_capacity</th>
            <th scope="col">Type</th>
            <th scope="col">Niveau</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classes as $class)
            <tr>
                <td>{{$class->id}}</td>
                <td>{{$class->nom}}</td>
                <td>{{$class->max_capacity}}</td>
                <td>{{$class->type}}</td>
                <td>{{$class->niveau}}</td>



                <td>
                    <form action="{{route('back.destroy', $class->id)}}" method="post">

                        <a type="submit" class="btn btn-outline-warning" href="{{route('back.edit', $class->id)}}">Update</a>

                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/js/scripts/extensions/ext-component-ratings.js?id=dc26f93b2b884eeb649b"></script>
<script type="text/javascript">
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14, height: 14
            });
        }
    })
</script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/vendors/js/vendors.min.js?id=7dca1a1f6b86fd5d70ac"></script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/vendors/js/ui/jquery.sticky.js?id=17f0788e54b9dc4eb93d"></script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/vendors/js/extensions/jquery.rateyo.min.js?id=2b9ef0b94318a0aa6f8b"></script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/js/core/app-menu.js?id=0a3ed793d05ee5f6a9db"></script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/js/core/app.js?id=6b6c2cc9a41161053158"></script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/js/core/scripts.js?id=22050af26ee69f8533fc"></script>
<script
    src="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-4/js/scripts/customizer.js?id=00ad9be904861e76f046"></script>
