


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
<body style="background-color: rgba(222, 233, 236, 0.829);">
        @include('header', ['categories' => $categories23])

        <div class="row mt-5 "> </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
             @endif 
             @if(session('fail'))
             <div class="alert alert-danger">
                 {{ session('fail') }}
             </div>
                  @endif 
<form action="/ajoutcommandenv" method="POST" class=" ms-5">
    @csrf
    <div class="row ">
<h5>Finaliser la Commande</h5>

<div class="card col-md-7">

    <div class="card-body p-3">
        <h5>Adresse de Livraison</h5>

<div class="row mt-2 mb-4 ">  
    @php
    $myArray = session()->get('userInfo', []);
    $Array = $myArray->pluck('id')->all();
    $id =  implode(', ', $Array);
    @endphp
    <div class="mb-3 col-md-6">
        <label for="nom" class="form-label mb-4"> <i class="fas fa-user icon"></i> Nom <span class="required-star " style="color: red;">*</span></label>
        <input type="text" required class="form-control" id="libelle" name="nom" style="background-color: rgba(222, 233, 236, 0.829);"  placeholder="Entrez votre nom">
        <input type="text" value="{{$id}}" hidden required class="form-control" id="id" name="userid" style="background-color: rgba(222, 233, 236, 0.829);"  placeholder="Entrez votre nom">
    </div>
    
    <div class="mb-3 col-md-6">
        <label for="prix" class="form-label mb-4"> <i class="fas fa-user icon"></i> Prenom<span class="required-star " style="color: red;">*</span></label>
        <input type="text" required class="form-control" style="background-color: rgba(222, 233, 236, 0.829);" id="prix" name="prenom" placeholder="Entrer votre prenom">
    </div>

</div>

<div class="row mt-5">  

    <div class="mb-3 col-md-6">
        <label for="phone" class="form-label mb-4"><i class="fas fa-phone icon"></i> Numero de telephone <span class="required-star " style="color: red;">*</span></label>
        <input type="Number" required class="form-control" id="libelle" name="phone" style="background-color: rgba(222, 233, 236, 0.829);"  placeholder="Entrez votre Numero">
    </div>
    
    <div class="mb-3 col-md-6">
        <label for="email" class="form-label mb-4"> <i class="fas fa-envelope icon"></i> Adresse Electronique <span class="required-star " style="color: red;">*</span></label>
        <input type="email" required class="form-control" style="background-color: rgba(222, 233, 236, 0.829);" id="prix" name="email" placeholder="Entrer votre email">
    </div>
    
</div> 

<div class="row mt-5">  

    {{-- <div class="mb-3 col-md-6">
        <label for="ville" class="form-label mb-4">  <i class="fas fa-home icon"></i> Ville-Quartier <span class="required-star " style="color: red;">*</span></label>
        <select class="form-select" required name="ville" style="background-color: rgba(222, 233, 236, 0.829);" id="categorie">
           
            @foreach($villes as $ville)
            <option value="{{$ville->id}}">{{$ville->nom_localisation}}</option>
            @endforeach

            </select>
    </div> --}}
    
    <div class="mb-3 col-md-12">
        <label for="contact"  class="form-label mb-4"><i class="fas fa-phone icon"></i>  Contact Whatsapp</label>
        <input type="numbre" class="form-control" style="background-color: rgba(222, 233, 236, 0.829);" id="prix" name="contact" placeholder="Entrer votre numero whatsapp">
    </div>

</div>
</div></div>

@php
$totalle=0;
@endphp
@foreach($produits as $id => $produit)
@php
$totalle=$totalle+$produit['qttestock']*$produit['prix'];
@endphp
@endforeach



<div class="col-md-4 ms-2">
    <div class="card mt-2">

        <div class="card-body p-3">

            <h5 class="text-danger fw-bold" style="font-size: 25px;">TOTAL : {{$totalle}} FCFA</h5>
    
            <div class="row  ps-5 " style="background-color: rgba(222, 233, 236, 0.829);">  
            <span class="mb-1"> Sous total:&ensp;&ensp;{{$totalle}} FCFA</span>
            <span class="mb-1">Reduction:   &ensp;0 FCFA</span>
            <span>Total: &ensp; &ensp; &ensp;&ensp;&ensp;{{$totalle }} FCFA</span>

        </div>

    </div></div>
    <div class="card mt-2">

    <div class="card-body p-3">
        <h5>Paiement</h5>

<div class="row">  
        
            <div class="row" class="mt-3">
                <div class="mb-3 col-md-6">
                <label for="name" class="form-label"> Numero</label>
                <input type="number" class="form-control" id="name" name="categorie" style="border-top:none;border-left:none;border-right:none; border-bottom:solid 2px rgb(11, 11, 12);" placeholder=" EX : 656768943 ">
            </div>
           <div class="mb-3 col-md-6">
                <label for="name" class="form-label"> Montant</label>
                <input type="text" class="form-control" id="name" readonly name="montant" value="{{$totalle}} FCFA"  style="border-top:none;border-left:none;border-right:none; border-bottom:solid 2px rgb(10, 10, 12); background-color: rgba(222, 233, 236, 0.829);"  >
            </div>  
            </div>
            <div class="row" class="mt-3">

                <div class="mb-3 col-md-6">
                    <button style="border: none; background:none;" class="mt-3 ms-1"><img src="photos/mtn1.jfif" class=" img-fluid rounded" style="width: 50px; height: 50px;" alt="..."></button>
                <button style="border: none; background:none;" class="ms-5"><img src="photos/om.jfif" class=" img-fluid rounded" style="width: 50px; height: 50px;" alt="..."></button>
                     </div>    
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label"> Mode paiement</label>
                <select class="form-select" name="categorie" id="categorie">
                    <option value="Orange Money">Orange Money</option>
                    <option value="MTN Mobile Money">MTN Mobile Money</option>

                    </select>
                </div>     
                
        </div>    
          

        </div>
        <div class="modal-footer text-center">
            <button type="Submit" class="btn bg-success ps-2 pe-2 me-5" >Valider</button>

</div>
</div></div>



</div>
</div>
</form>


</body>
@include('footer1')