@include('Shared.header')
<div class="container-fluid page-header2" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Reclamations</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Reclamation</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{Vite::asset("resources/assets/img/reclamation.jpg")}}" alt="">
            </div>
            <div class="col-lg-7" style="word-wrap: break-word">
                <div class="text-left mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"></h5>
                    <h1 >{{$reclamation->titre}}</h1>
                </div>
                <p>{{   $reclamation->description}}</p>
             
            </div>
        </div>
    </div>
</div>

@include('Shared.footer')

</body>

</html>
