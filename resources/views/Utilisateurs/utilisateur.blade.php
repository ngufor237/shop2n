<!DOCTYPE html>
<!-- saved from url=(0087)file:///C:/Users/ADMINI~1/AppData/Local/Temp/Rar$EXa12672.44623/registration/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Styles -->

        <style>
          /* Masquer la première option dans la liste déroulante */
          #droit option[value=""] {
              display: none;
          }

          .form-label-custom {
            font-weight: bold;
            color: #6c757d; /* Couleur claire, gris dans ce cas */
        }
      </style>
</head>
<body>
@include('admin')
    <div class="row mt-5">
   
    
    <div class="col-md-2"></div> 
    <div class="col-md-8">

<section class="vh-100">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
   
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src={{ asset('img/logo2n.png') }}
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <div class="row mt-5"> <div class="col-md-4"></div> 
    <div class="col-md-5">
    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3"><h3>Sign Up</h3></p>
</div></div>
<div class="col-md-2"></div> </div>
        <form action="{{route('AddUtilisateur')}}" method="POST">
          @csrf
          <div data-mdb-input-init class="form-outline mb-2">
            <input type="text" id="form3Example" name="name" class="form-control form-control-lg"
              placeholder="Entrez votre nom" required/>
            <label class="form-label" for="form3Example3">Nom</label>
          </div>
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-2">
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
              placeholder="Entrez une adresse email valide" required/>
            <label class="form-label" for="form3Example3">Adresse Email</label>
          </div>

          <div class="form-outline mb-3">
            <select name="droit" id="droit" class="form-select form-control form-control-lg" required>
              <option value="" disabled selected class="form-label-custom" >Choisir un droit</option>
              <option value="admin">Administrateur</option>
              <option value="secretaire">Secrétaire</option>
            </select>
            <label class="form-label" for="droit">Droit</label>
          </div> 
       

          <div data-mdb-input-init class="form-outline mb-2">
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              placeholder="Entrez votre mot de passe" required/>
            <label class="form-label" for="form3Example4">Mot de Passe</label>
          </div>


          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3"/>
              <label class="form-check-label" for="form2Example3">
                Rappellez-moi 
              </label>
            </div>
            <a href="#!" class="text-body">Mot de passe oublié?</a>
          </div>

          <div class="text-center text-lg-start mt-2 pt-2">
            <div class="row"> <div class="col-md-2"></div> <div class="col-md-5"><button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">SignUp</button></div><div class="col-md-2"></div> </div>
            
            <p class="small fw-bold ms-4 mt-2 pt-1 mb-0" >Vous avez déjà un compte? <a href="{{route('login')}}"
                class="link-danger">Connectez-vous</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section></div> <div class="col-md-2"></div>  </div>
    <script type="text/javascript" src="./The Easiest Way to Add Input Masks to Your Forms_files/jquery-3.2.1.min.js.télécharger"></script>
    <script type="text/javascript" src="./The Easiest Way to Add Input Masks to Your Forms_files/jquery.mask.min.js.télécharger"></script>
    <script src="./The Easiest Way to Add Input Masks to Your Forms_files/script.js.télécharger"></script>


</body></html>