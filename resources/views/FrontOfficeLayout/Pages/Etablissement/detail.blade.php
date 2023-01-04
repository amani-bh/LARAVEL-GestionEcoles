@include('Shared.header')
<div class="container-fluid page-header3" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Etablissements</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Etablissement</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{Vite::asset("resources/assets/img/etablis.png")}}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="text-left mb-2" >
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"></h5>
                    <h2 style="margin-bottom:30px" ><i class="fa fa-university mx-1" aria-hidden="true"></i>Esprit School</h2>
                </div>
                <h6 style="display:inline"><i class="fa fa-cog mx-1" aria-hidden="true"></i>Adresse : </h6> <p style="display:inline">
                {{$user->etablissement->adress}}</p><br>
                 <h6 style="display:inline"><i class="fa fa-cog mx-1" aria-hidden="true"></i>Email : </h6> <p style="display:inline">{{$user->etablissement->email}}</p><br>
                  <h6 style="display:inline"><i class="fa fa-cog mx-1" aria-hidden="true"></i>Telephone : </h6> <p style="display:inline">{{$user->etablissement->tel}}</p><br>
                   <h6 style="display:inline"><i class="fa fa-cog mx-1" aria-hidden="true"></i>Nombre Maximale : </h6> <p style="display:inline">{{$user->etablissement->nmbrmax}}</p>
            </div>
        </div>
    </div>
</div>

@include('Shared.footer')

</body>

</html>
