<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    <!-- Fonts -->
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    @include("admin")


<div class="row">
            <div class="col-md-3">

            </div>
    
            <div class="container mt-5 col-md-6">
            @if(session('successaddp'))
    <div class="alert alert-success">
        {{ session('successaddp') }}
    </div>
         @endif 

         @if(session('failaddp'))
    <div class="alert alert-danger">
        {{ session('failaddp') }}
    </div>
         @endif 
    <form action="{{route('modproduit')}}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="libelle" class="form-label">Libellé  </label>
                            <input type="text" class="form-control" id="libelle" value="{{$produits->libelle}}" name="libelle" placeholder="Entrer le libelle du produit">
                            <input value="{{$produits->id}}" type="text" class="form-control" id="id" hidden name="id">

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix Exellent</label>
                            <input type="number" class="form-control" value="{{$produits->prix}}" id="prix" name="prix" placeholder="Entrer le prix du produit">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix Bon</label>
                            <input type="number" class="form-control" value="{{$produits->prixbonetat}}" id="prix" name="prixbon" placeholder="Entrer le prix du produit">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix Correct</label>
                            <input type="number" class="form-control" value="{{$produits->prixetatcorrect}}" id="prix" name="prixcorrect" placeholder="Entrer le prix du produit">
                        </div>
                        </div>
                        <div>
                            <label  for="caracteristique" class="form-label">Caractéristiques</label>

            <select id="caracteristique" class="form-select" name="caracteristique[]" multiple="multiple" style="width: 100%">
                @foreach($options as $option)
                    <option value="{{ $option->id }}" >{{ $option->nomCaract }}</option>
                @endforeach
            </select>
            </div>
            <div class="row" class="mt-3">
                        <div class="mb-3 col-md-6">
                            <label for="souscategorie" class="form-label">Sous Catégorie</label>
                            <select class="form-select" name="souscategorie" id="souscategorie">

                                @foreach($souscategories as $optionas)
                                    <option value="{{ $optionas->id }}" {{ $optionas->id == $produits->souscategorie_id ? 'selected' : '' }}>{{ $optionas->categorie->nomCat ." " }}||{{" ".  $optionas->nomsubCat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qtte" class="form-label">Qtte Exellent en stock</label>
                            <input type="number" class="form-control" id="qtte" name="qtte" value="{{$produits->qttestock}}" placeholder="Entrer la quantite en stock">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qtte" class="form-label">Qtte Bon en stock</label>
                            <input type="number" class="form-control" id="qtte" name="qttebon" value="{{$produits->qttestockbonetat}}" placeholder="Entrer la quantite en stock">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qtte" class="form-label">Qtte Correct en stock</label>
                            <input type="number" class="form-control" id="qtte" name="qttecorrect" value="{{$produits->qttestocketatcorrect}}" placeholder="Entrer la quantite en stock">
                        </div>
                        </div>

                        <div class="form-outline" data-mdb-input-init>
                        <label class="form-label" for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description',$produits->description)  }}</textarea>
    </div>
    <div class="mb-3 ">
                            <label for="image" class="form-label">Images</label>
                            <input type="file" class="form-control" id="image" name="image[]" multiple  placeholder="veuillez entrer les images du produits ">
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-lg rounded-pill me-3" style="background-color: rgb(12, 165, 91)">Submit</button>
                                <button type="submit" class="btn btn-danger btn-lg rounded-pill ms-3" style="color: rgb(10, 9, 9)">Reset</button>
                            </div>
                            
                        </div>
        </form></div>

        <div class="col-md-3">

</div></div>

     <script>
        $(document).ready(function() {
            $('#caracteristique').select2({
                placeholder: 'Select options',
                allowClear: true
            });
        });
    </script>


   
</body>
</html>
