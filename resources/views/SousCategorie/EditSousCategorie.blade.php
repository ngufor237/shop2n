<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SousCategorie</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
        <div class="col-md-4">

        </div>
   
        <div class="container mt-5 col-md-4">
            <div class="card p-4">
                <h2 class="text-center mb-4">Modifier Sous Categorie</h2>
                <hr>

                <form action="{{ route('UpdateSousCategorie') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select id="categorie" class="form-select" name="categorie" style="width: 100%;">
                            @foreach($categories as $option)
                                <option value="{{ $option->id }}"  {{ $option->id == $souscategories->categorie_id ? 'selected' : '' }}>{{ $option->nomCat }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                   


                    <div class="mb-3">
                        <label for="name" class="form-label">Nom Sous Categorie</label>
                        <input value="{{$souscategories->nomsubCat}}" type="text" class="form-control" id="name" name="souscategorie">
                        <input value="{{$souscategories->id}}" type="text" class="form-control" id="id" hidden name="id">
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-lg rounded-pill me-1" style="background-color: rgb(12, 165, 91)">Modifier</button>
                            <button type="reset" class="btn btn-danger btn-lg rounded-pill ms-1" style="color: rgb(10, 9, 9)">Annuler</button>
                        </div>
                        
                    </div>
                  
                </form>
            </div>
        </div>
        <div class="col-md-4">

        </div>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript"src=  "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
</body>
</html>
