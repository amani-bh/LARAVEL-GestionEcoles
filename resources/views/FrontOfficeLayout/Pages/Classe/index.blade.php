@include('Shared.header')
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <a class="btn btn-outline-primary" href="{{route('classes.create')}}">New Classe</a>
        <div class="text-center mb-1">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Classes</h5>
            <h1>Meet Our Best classe</h1>
        </div>
    </div>
</div>
<div class="container px-1 mt-1 mb-1">
    @foreach($tops as $t)
        <div class="col-lg-6 col-md-2 mb-2">
            <div class=" col-lg-8 rounded overflow-hidden mb-2">
                <img class="img-fluid" src="https://image.shutterstock.com/image-illustration/3d-guy-top1-260nw-402019894.jpg" alt="">
                <div class="bg-secondary p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>{{$t->max_capacity}}
                            Students</small>
                        <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>  {{$t->nom}}
                            </a> </small>
                    </div>
                    <a class="h6" href="classes/{{$t->id}}">Details Classe</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5/5
                                    <small>{{$t->niveau}}</small>
                                </h6>
                                <h5 class="m-0"><i class="fa fa-star checkeded "></i>
                                    <i class="fa fa-star checkeded "></i>
                                    <i class="fa fa-star checkeded "></i>
                                    <i class="fa fa-star checkeded "></i>
                                    <i class="fa fa-star checkeded "></i>
                                </h5>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    @endforeach

    <table class="table table-bordered table-hover">

        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Max_capacity</th>
            <th scope="col">Type</th>
            <th scope="col">Niveau</th>
            <th scope="col">Rating</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classe as $class)
            <tr>
                <td>{{$class->id}}</td>
                <td>{{$class->nom}}</td>
                <td>{{$class->max_capacity}}</td>
                <td>{{$class->type}}</td>
                <td>{{$class->niveau}}</td>
                <td>

                    <a href="{{route('classes.show', $class->id)}}">Go To Rate Classe</a>
                </td>

                <td>
                    <form action="{{route('classes.destroy', $class->id)}}" method="post">

                        <a type="submit" class="btn btn-outline-primary " href="{{route('classes.show', $class->id)}}">Details</a>
                        <a type="submit" class="btn btn-outline-warning" href="{{route('classes.edit', $class->id)}}">Update</a>

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
