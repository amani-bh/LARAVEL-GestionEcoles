<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    *{
        margin:15px;
    }
</style>
</head>

<body style=" border: 1px solid purple; ">
    <h1 style="color:purple; text-align:center;">Reclamation </h1>
    <div ><img src="https://res.cloudinary.com/ddv3zr8ua/image/upload/v1666818629/s_750_400-q_75-26a4c1_bcf2rp.jpg" alt="rec" ></div>
   <div style="word-wrap: break-word !important;" >
                        
                            <p class="display-inline-block" >
                                <h5 style="color:purple" >
                                Sujet Reclamation : 
                                </h5><div class="mx-1">{{$reclamation->titre}}</div>
                            </p>
                            <p class="display-inline-block" >
                                <h5 style="color:purple">
                                Description Reclamation : 
                                </h5><div class="mx-1">{{$reclamation->description}}</div>
                            </p>
                            <p class="display-inline-block" >
                                <h5 style="color:purple">
                                Réclamateur : 
                                </h5>
                                    <div class="mx-1">{{$reclamation->user->name}}</div></p>
                                <p class="display-inline-block" >
                                <h5 style="color:purple">
                                Email Reclamation : 
                                </h5><div class="mx-1"> {{$reclamation->user->email}}</div></p>
                                <p class="display-inline-block" >
                                <h5 style="color:purple">
                                Etablissement Du Réclamateur : </h5><div class="mx-1"> {{$reclamation->user->etablissement->name}}</div></p>
                                <p class="display-inline-block" >
                                <h5 style="color:purple">
                                Adresse Du Réclamateur : 
                                </h5><div class="mx-1">  {{$reclamation->user->etablissement->adress}}</div></p>
                            </ul>
    </div>
</body>
</html>