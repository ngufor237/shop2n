
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
           
                @include('header', ['souscategories' => $souscategories23])

<div class=" pt-2"></div>
<div class="row ">
            <div class="col-lg-7 mb-lg-0 mb-4 ms-lg-5 " >

                <div class="card ">

                <div class="card-body p-3 ">
                
            <div class="row">

                        <div class="col-lg-4 col-12 ms-auto text-center mt-5 mt-lg-0">
                        <div class="bg-gradient-primary border-radius-lg h-100">
                                @foreach($produits->images as $img)
                            <img src="{{ asset('photos/'.$img->nom) }}" class="mt-3" style="width: 200px" alt="waves">
                            @break
                                @endforeach
                        
                        </div>
                        </div>

                        <div class="col-lg-8 col-12">
                <div class="d-flex flex-column h-100">
                <h5 class="font-weight-bolder mt-3">{{$produits->categorie->nomCat}} - {{$produits->libelle}}  </h5>
                 <b id="etat" style="color: rgb(26, 199, 26)">Excellent Etat</b>
                 <div class="row">
                    <div class="col-md-3"><i class="fas fa-star" style=" color:#e5bd58; "></i><i class="fas fa-star" style=" color:#e5bd58; "></i><i class="fas fa-star" style=" color:#e5bd58; "></i><i class="fas fa-star" style=" color:#e5bd58; "></i><i class="fas fa-star" style=" color:#e5bd58; "></i></div>
                   

                </div>
                
                 <p>Vendu par 2N Boutique<br> Produit de 2N Corporate Sarl</p> 
                 <b>Caracteristiques:</b>  
                 <ul>
                    @foreach($produits->caracteristique as $cate)
    
                <li>

                    {{$cate->nomCaract}}
                </li>
                @endforeach
                </ul> 
                
                
                

<style>
    #bt1:hover{
        background-color: blue;
        color:white;
        border-radius: 30px;
    }

    #bt1{
        border-radius: 30px;
        border: solid 2px blue;

    }

    #buttonx:hover{
        color:rgb(28, 201, 43);
    }

        .carousel-item {
            transition: transform 0.5s ease-in-out;
        }
</style>

<div class="row " >
    <div class="col-md-4">
       

        <button id="scrollButton" style="border: none; background-color: white;">   <a href="#" ><input type="button" id="bt1" value="Description du produit" style=""  class="btn" onclick="activateMenuItem(this)"></a></div> </button>
                <div class="col-md-4 ">  <a href="/"><input type="button"  id="bt1" value="Information sur le produit" class="btn mt-lg-0 " onclick="activateMenuItem(this)"></a></div>
            </div>
            
                </div>
                </div>
            
            </div>

            <div class="row " >
                <div class="col-md-7 button"> </div>

<div  hidden id="test">{{ $produits->prix }} FCFA </div>
<div  hidden id="test2">{{ $produits->prixbonetat }} FCFA </div>
<div  hidden id="test3">{{ $produits->qttestocketatcorrect }} FCFA </div>


                <div class="col-md-5 button mt-5">
                    <button class="button button1 bg-success" style="background-color: white; border-color:rgb(25, 105, 78); color:white; border:none"  id="buttonx " onclick="changeContent1()">Excellent état</button>
                    <button  class="button button2 bg-primary" style="background-color: white; border-color:rgb(20, 112, 81); color:white; border:none" id="buttonx"onclick="changeContent2()">Très bon état</button>
                    <button  class="button button3 mt-1 bg-danger" style="background-color: white; border-color:rgb(13, 94, 67); color:white; border:none" id="buttonx" onclick="changeContent3()">État Correct</button>
                </div>
                        
                            </div>

                @php 
                $nbreimg=count($produits->images);
                $nbre=$nbreimg/4;
                @endphp

            @if ($nbreimg>0)
            
            

           
            <div class="container mt-5">
                <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner d-none d-md-block">
                        @foreach($produits->images->chunk(4) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach($chunk as $product)
                                        <div class="col-md-3 mb-4">
                                            <div class="card">
                                           
        
                                                <img class="card-img-top ms-5" src="{{ asset('photos/'.$product->nom) }}" style="height:100px; width:100px;" alt="{{ $img->nom }}">
                                              
                                                
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="carousel-inner container d-block d-md-none">
                        @foreach($produits->images->chunk(1) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach($chunk as $product)
                                        <div class="col-md-3 mb-4">
                                            <div class="card">
                                           
        
                                                <img class="card-img-top ms-5" src="{{ asset('photos/'.$product->nom) }}" style="height:100px; width:100px;" alt="{{ $img->nom }}">
                                              
                                                
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            </div>
                    @endif 
                </div>
                </div>
               

              
            </div>
                
                
                <div class="col-lg-4 ">
                    <div class=" pt-2"></div>

                    <div class="card">

                    <div class="card-body p-3">
                        <div class="row">
                           
  
                                <div class="col-12 text-center">
                                    @php
                                    $nombre = $produits->prix;
                                    $nombreEntier = (int) $nombre;
                                    $ancienp=$nombreEntier+$nombreEntier/2;
                                @endphp
                               
                                    <span class="me-3" id="prixreduit" style="font-size: 20px; text-decoration: line-through; text-decoration-color: black; text-decoration-thickness: 2px; text-align: center; display: inline-block; vertical-align: 0.2em;">{{$ancienp}} FCFA</span>
                                  
                                <span id="prix" class="text-danger fw-bold" style="font-size: 30px;">{{$nombreEntier}} FCFA</span>
                                <br>
                                <span class="center-text" style="font-size: 13px;"><i class="fas fa-car-side"></i>Récupération dans nos locaux</span>
                                <br>

<form action="{{route('addtocart2')}}" type="submit" method="post">
    @csrf

                                <label for="">Quantité :</label>
                                <input type="number" class="mb-3 mt-2" style="width: 75px" value=1 min=1 name="quantite"><br> 
                                <input type="text" hidden class="mb-3 " style="width: 75px" value="excellent"  name="etat" id="etatprod"><br> 

                                <input type="text " hidden value="{{$produits->id}}" name="id">
                                <b style="color: rgb(26, 199, 26)" >Plus de 50 commandes en cours</b><br>

                                
                                <button class="btn btn-primary btn-lg rounded-pill mt-3" type="submit" style="text-decoration: none; color:white;" >Ajouter au panier</button>
                            </form>
                                <style>
                                    .center-text {
                                    display: inline-block;
                                    vertical-align: middle;
                                    line-height: normal;
                                    }
                                </style>
                            </div>
                            </div>
                        
                    
                        </div> </div>
                        <div class="card mt-1">

                            <div class="card-body p-3">
                                <div class="row">
                                    <h5>Information de Récupération</h5>
                                    <span class="ms-2">Récupérer vos produits dans tous nos points de vente</span>
                                    {{-- <span class="center-text ms-5" style="font-size: 13px;"><i class="fas fa-car-side mt-1 me-1"></i>Livraison gratuite</span> --}}
                                    <span class="ms-5"><i class="fas fa-home home-icon mt-1 me-1"></i>Récupération dans un délai de 48H</span>
                                    <span class="ms-5 "><i class="fas fa-map-marker-alt icon mt-1 me-1"></i>Cameroun - Douala Bonabéri Face Ancien Cinéma Fohato</span>



                                </div></div></div>
                       </div></div>
            </div>
        </div>
            <div class="container mt-5 col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner me-lg-5">
                        @foreach($products->chunk(4) as $index => $chunk)
                            <div class="carousel-item ms-lg-5 ps-lg-5 {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">

                                    <div class="col-lg-1 col-md-2 col-sm-6 pb-1"></div>

                                    @foreach($chunk as $product)
                                        




                                            <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                                                <div class="card product-item border-0 mb-4 shadow-sm"  style="height: 25rem;">
                                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent p-0 text-center h-100">
                                                        @foreach($product->images as $img)
                                                       
                            
                                                        <img class="img-fluid h-100" src={{ asset('photos/'.$img->nom) }} alt="" >
                                                        @break
                                                        @endforeach
                            
                                                    </div>
                                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 h-100">
                                                        <h6 class="text-truncate mb-3">{{$product->libelle}}</h6>
                                                        @php
                                                            $inc=rand(3, 6);
                                                        @endphp
                                                        <div class="row">
                                                          <div>
                                                                @for ($i=1; $i<=$inc; $i++)
                                                                <i class="fas fa-star" style=" color:#e5bd58; "></i>
                                                                @endfor
                                                        </div>
                                                           
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                   <h6class="me-2">                                          <span id="prix" class="text-danger fw-bold" style="font-size: 20px;">{{$product->prix}} FCFA</span>                                                            </h6><h6 class="text-muted ml-2"><del>{{$product->prix+$product->prix/2}}</del></h6>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                                        <a href="/detailprod/{{$product->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                                        <a href="/addtocard/{{$product->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>


                                           



                                    @endforeach
                                    <div class="col-lg-1 col-md-2 col-sm-6 pb-1"></div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev me-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>

                </div>
            </div>


            <script>
                function changeContent1() {
                    document.getElementById('etat').innerText = "Reconditionné - Excellent Etat";
                    var divContent = document.getElementById('test').innerHTML;
                    document.getElementById('etatprod').value="excellent";

                    
                    document.getElementById('prix').innerText = divContent;

                }
                
                function changeContent2(newContent) {
                    document.getElementById('etat').innerText = "Reconditionné - Bonne Etat";
                    var divContent = document.getElementById('test2').innerHTML;
                    document.getElementById('etatprod').value="bon";

                    document.getElementById('prix').innerText = divContent;                }

                function changeContent3() {
                    document.getElementById('etat').innerText = "Reconditionné - Etat Correct";
                    var divContent = document.getElementById('test3').innerHTML;
                    document.getElementById('etatprod').value="correct";

                    document.getElementById('prix').innerText = divContent;                }
            </script>

<div id="targetDiv" >
   


                    <div class="card  mb-3 ms-0 ms-lg-5 text-center col-12" >
                        <div class="card-header"><H3>Description du produit</H3></div>
                        <div class="card-body">
                          <p class="card-text">  <b>{{$produits->description}}</b>  <i class="bi bi-check-circle text-success"></i></p>
                        </div>
                      </div>


<!-- Inclure ici vos scripts JavaScript -->
<script>
    document.getElementById('scrollButton').addEventListener('click', function() {
        document.getElementById('targetDiv').scrollIntoView({ behavior: 'smooth' });
    });
</script>


@include('footer1')
