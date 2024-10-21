<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
                #ess1{
                    text-decoration: none;
                    color: black;
                }

                #ess1:hover  {
                    text-decoration: none;
                    background-color: rgb(8, 8, 8);
                    color:white;
                }
                .bg-orange {
                    background-color: rgb(176, 117, 68)
                }
                .bg-blue {
                    background-color: #4b0ed9
                }
                .bg-indigo {
                    background-color: #14363b
                }
                .carousel-item img {
                    object-fit: contain;
                    width: 100%;
                    height: 100%;
                }
                .navbar-collapse .navbar-nav .nav-item {
                    margin-right: 2rem !important; /* Espace entre les éléments de la navbar */
                }

                .navbar-collapse .navbar-nav .nav-link {
                    color: white !important; /* Couleur blanche pour les liens de la navbar */
                }
                
                .carousel-image {
                    height: 500px; /* Définissez la hauteur souhaitée */
                    object-fit: cover; /* Permet de conserver les proportions de l'image tout en remplissant l'espace */
                }


                .custom-font {
                font-family: 'Roboto', sans-serif; /* Appliquer la police uniquement à cet élément */
                }
                .brand-grid .brand-item {
                border: 1px solid #faf8f8;
                background-color: #dbe2ea; /* Fond légèrement gris */
                padding: 20px;
                margin: 10px;
                border-radius: 5px; /* Coins arrondis */
                transition: transform 0.2s;
                }
        
            .brand-grid .brand-item:hover {
                transform: scale(1.05); /* Effet de zoom au survol */
            }
        
            .brand-grid img {
                max-width: 100px;
                max-height: 50px;
            }
            /* General Styles */
.container-fluid {
    padding-top: 5rem;
}

.section-title {
    font-size: 1.5rem;
    margin-bottom: 2rem;
}

/* Card Styles */
.product-item {
    border-radius: 8px;
}


/* General Styles */
.container-fluid {
    padding-top: 5rem;
}

.section-title {
    font-size: 2rem;
    margin-bottom: 2rem;
}

/* Card Styles */
.product-item {
    border-radius: 8px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Product Image Styles */
.product-img {
    position: relative;
}

.product-img img {
    width: 100%;
    height: 30vh;
    border-radius: 8px 8px 0 0;
}

/* Overlay Styles */
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    border-radius: 8px 8px 0 0;
}

.product-img:hover .overlay {
    opacity: 1;
}

.overlay .text {
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .product {
        flex: 0 0 calc(50% - 1rem); /* Two products per row */
        margin: 0.5rem; /* Add some space between cards */
        width: 40%;
    }

}

@media (min-width: 992px) {
    .nav-center {
        display: flex;
        justify-content: center;
    }
    .product-item {
        flex: 0 0 calc(33.33% - 1rem); /* Three products per row for tablet */
        margin: 0.5rem; /* Add some space between cards */
    }
    .product-item {
        flex: 0 0 calc(33.33% - 1rem); /* Three products per row for tablet */
        margin: 0.5rem; /* Add some space between cards */
    }
}
@media (min-width: 993px) {
    .product-item {
        flex: 0 0 calc(20% - 1rem); /* Five products per row for larger screens */
        margin: 0.5rem; /* Add some space between cards */
    }
    .product-item {
        flex: 0 0 calc(20% - 1rem); /* Five products per row for larger screens */
        margin: 0.5rem; /* Add some space between cards */
    }
}
        </style>


    <title>Document</title>
</head>
<body style="  background-color:rgba(222, 233, 236, 0.829);">
   
@include('header',['souscategories' => $souscategories])

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 

<div class="row col-md-12 mt-5 ">
    <div class="col-md-3 mb-2">
        <div class="card mt-1">
            <div class="card-body">
                <div class="row">
                    <span><b>Nos Rayons</b></span>
                    @foreach($souscategories1 as $souscateg)
                        <a href="/produitcate/{{$souscateg->id}}" id="ess1" >{{$souscateg->nomCat}}</a>
                    @endforeach
                </div>
            </div>
        </div> 
    </div>
    <div class="col-md-7 ">
                <style>
                    .carousel-item img {
                        object-fit: cover;
                        width: 100%;
                        height: 300px;
                    }
                </style>
        <div id="carouselExampleControls1b1" class="carousel slide " data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @foreach($publicites as $index => $pub)
                    <div class="carousel-item    {{ $index === 0 ? 'active' : '' }}">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="card product-item border-0 shadow-sm col-md-12 " >
                                <div class="col-md-12 ">
                                    <a href="/detailprod/{{$pub->produit_id}}"> 
                                    <img class="img-fluid w-100 " src="{{ asset('photos/'.$pub->nom) }}" alt="" style="flex: 0 0 auto;  height: 300px;"></a>
                                </div> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1b1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1b1" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
        </div>
    </div>
    <div class="col-md-2 ">
        <div class="row d-none d-lg-block" >
            <img class="img-fluid" style=" height:200px; width:250px;  border-radius: 30px;" src={{ asset('photos/ecom6.jpg') }} alt="bbbbbbbbb">
        </div>
    
    <div class="row mt-2">
        <div class="card border-0 shadow-sm bg-success fs-5 text-white opacity-95">
            <span>Heures d'ouverture</span>
            <span>Lun - Ven : 8h30 - 18h</span>
            <samp>Sam : 8h30 - 13h</samp>
        </div>
    </div>
</div>

</div>
</div>
</div>

<div class="card mb-3 col-md-12 me-2 mt-5" >
    <div class="card-body">
        <div >
            <div class="d-flex justify-content-between">
                <div style="color: rgb(0, 119, 255)"> <h5>Des équipes prête à vous satisfaire.</h5> </div>
                <button class="btn btn-primary">Voir plus</button>
            </div>
        </div>        
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4 rounded-3 bg-indigo" style="padding: 30px;">
                <h1 class="fa fa-check text-white m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">Produits de qualité</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4 rounded-3 bg-indigo" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-white m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">Récupération rapide</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4 rounded-3 bg-indigo" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-white m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">Service impécable</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4 rounded-3 bg-indigo" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-white m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">Ouvert 6 jours / 7</h5>
            </div>
        </div>
    </div>
</div>


<div class="row ms-1 ms-md-5 ps-md-5">
    <div class="d-none d-md-block col-md-3 ">
        <div id="carouselExampleSlidesOnly" class="carousel slide bg-white mt-5 pt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active ps-md-5" >
                    <img src={{ asset('photos/first.png') }} class="w-50 h-50 ms-md-5" style="width: 50px; height: 50px;"  alt="...">
                    
                </div>
                @foreach($produits as $produit)
                    @foreach($produit->images as $img)
                    <div class="carousel-item ps-md-5" >
                        <img src={{ asset('photos/'.$img->nom) }} class="w-50 h-50 ms-md-5" style="width: 50px; height: 50px;" alt="...">
                    </div>
                    @endforeach
                @endforeach
                
            </div>
        </div>
    </div>   
    <div class="d-none d-md-block col-md-3 ">
        <div id="carouselExampleSlidesOnly" class="carousel slide bg-white mt-5 pt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active ps-md-5" >
                    <img src={{ asset('photos/first.png') }} class="w-50 h-50 ms-md-5" style="width: 50px; height: 50px;"  alt="...">
                    
                </div>
                @foreach($produits as $produit)
                    @foreach($produit->images as $img)
        
                    <div class="carousel-item ps-md-5" >
                        <img src={{ asset('photos/'.$img->nom) }} class="w-50 h-50 ms-md-5" style="width: 50px; height: 50px;" alt="...">
                    
                    </div>
                    @endforeach
                @endforeach
                
            </div>
        </div>
    </div>
    <div class="d-none d-md-block col-md-3 ">
        <div id="carouselExampleSlidesOnly" class="carousel slide bg-white mt-5 pt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active ps-md-5" >
                    <img src={{ asset('photos/first.png') }} style="height: 4px;" class="w-50 h-50 ms-md-5" style="width: 50px; height: 50px;"  alt="...">
                    
                </div>
                @foreach($produits as $produit)
                    @foreach($produit->images as $img)
                    <div class="carousel-item ps-md-5" >
                        <img src={{ asset('photos/'.$img->nom) }} class="w-50 h-50 ms-md-5" style="width: 50px; height: 50px;" alt="...">
                    
                    </div>
                    @endforeach
                @endforeach
                
            </div>
        </div>
    </div>
</div>

<div class="row ms-5 ps-5 mt-5 d-none d-md-block">
    <div class="col-md-12 col-sm-12 pb-1 ms-2 ">
        <div class="card product-item border-0 mb-4 shadow-sm col-md-11 p-3" style="overflow-x: auto; white-space: nowrap;">
            <div class="d-flex">
                <div class="col-md-2  ">
                    <img class="img-fluid " src="{{ asset('img/LG.png') }}" alt="fffffffffff" style="flex: 0 0 auto; width: 230px; height: 220px;">
                </div> 
                <div class="col-md-2  ">
                    <img class="img-fluid " src="{{ asset('img/Samsung.png') }}" alt="fffffffffff" style="flex: 0 0 auto; width: 230px; height: 220px;">
                </div> 
                <div class="col-md-2  ">
                    <img class="img-fluid " src="{{ asset('img/Tecno.png') }}" alt="fffffffffff" style="flex: 0 0 auto; width: 230px; height: 220px;">
                </div> 
            </div>
        </div>
    </div>
</div>




<div class="row mt-5 d-block d-md-none">
    <div class="col-md-12 col-sm-12 pb-1 ms-2 ">
        <div class="card product-item border-0 mb-4 shadow-sm col-md-11 p-3" style="overflow-x: auto; white-space: nowrap;">
            <div class="d-flex">
                    <div class="col-6 ">
                        <img class="img-fluid " src="{{ asset('img/LG.png') }}" alt="fffffffffff" style="flex: 0 0 auto; width: 220px; height: 220px;">
                    </div> 
                    <div class="col-6  ">
                        <img class="img-fluid " src="{{ asset('img/Samsung.png') }}" alt="fffffffffff" style="flex: 0 0 auto; width: 220px; height: 220px;">
                    </div> 
                    
            </div>
        </div>
    </div>
</div>

<div class="card mb-3 col-md-12 me-2 mt-5" >
    <div class="card-body">
        <div>
            <div class="d-flex justify-content-between">
                <div id="nouv"></div>
                <div style="color: rgb(0, 119, 255)"> <h5>Produits sur mesure pour vous</h5> </div>
                <button class="btn btn-primary">Voir plus</button>
            </div>
        </div>      
    </div>
</div>


<div class=" mt-5 col-md-12 d-none d-md-block" style="height: 150px;">
    <div id="carouselExampleControls" class="carousel slide ">
        <div class="carousel-inner ">
            @foreach($produits->chunk(8) as $index => $chunk)
                <div class="carousel-item ms-lg-5 ps-lg-5   {{ $index === 0 ? 'active' : '' }}">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12 pb-1 ">
                            <div class="card product-item border-0 mb-4 shadow-sm col-md-11 p-3" style="overflow-x: auto; white-space: nowrap;">
                                <div class="d-flex">
                                    @foreach($chunk as $produit)
                                        @foreach($produit->images as $img)
                                        <div class="col-md-1 ms-1 me-5">
                                            <img class="img-fluid " src="{{ asset('photos/'.$img->nom) }}" alt="" style="flex: 0 0 auto; width: 100px; height: 100px;">
                                        </div> 
                                        @break
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev mt-5 h-25" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon me-5 pe-5 mb-5" aria-hidden="true"> <i class="fas fa-chevron-left ps-4 pe-4 pt-4 pb-4 " style="color: black; background-color:white;"></i>
            </span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next mt-5 h-25 ms-5 ps-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon me-5 pe-5 mb-5 ms-5" aria-hidden="true"> <i class="fas fa-chevron-right  ms-3 ps-4 pe-4 pt-4 pb-4" style="color: black; background-color:white;"></i></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>



<div class=" mt-5 col-md-12 d-block d-md-none" style="height: 150px;">
    <div id="carouselExampleControls1a" class="carousel slide ">
        <div class="carousel-inner d-block d-md-none">
            @foreach($produits->chunk(2) as $index => $chunk)
                <div class="carousel-item ms-lg-5 ps-lg-5   {{ $index === 0 ? 'active' : '' }}">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12 pb-1 ">
                            <div class="card product-item border-0 mb-4 shadow-sm col-md-11 p-3" style="overflow-x: auto; white-space: nowrap;">
                                <div class="d-flex">
                                    @foreach($chunk as $produit)
                                        @foreach($produit->images as $img)
                                        <div class="col-md-5 ms-1 me-5">
                                            <img class="" src="{{ asset('photos/'.$img->nom) }}" alt="">
                                        </div> 
                                        @break
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev mt-5 h-25" type="button" data-bs-target="#carouselExampleControls1a" data-bs-slide="prev">
            <span class="carousel-control-prev-icon me-5 pe-5 mb-5" aria-hidden="true"> <i class="fas fa-chevron-left ps-4 pe-4 pt-4 pb-4 " style="color: black; background-color:white;"></i>
            </span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next mt-5 h-25 " type="button" data-bs-target="#carouselExampleControls1a" data-bs-slide="next">
            <span class="carousel-control-next-icon me-5 pe-5 mb-5 ms-3" aria-hidden="true"> <i class="fas fa-chevron-right  ms-3 ps-4 pe-4 pt-4 pb-4" style="color: black; background-color:white;"></i></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Catalogue des Produits</span></h2>
    </div>
    <div class="row px-xl-5 pb-3 product">
        @foreach($produits as $produit)
            <div class="col-lg-2 pb-9 text-center">
                <div class="card product-item border-0 mb-4 shadow-sm">
                    <div class="product-img position-relative overflow-hidden bg-transparent p-0 text-center h-100">
                        @foreach($produit->images as $img)
                            <img class="img-fluid" src="{{ asset('photos/'.$img->nom) }}" alt="">
                            @break
                        @endforeach
                        <div class="overlay">
                            <div class="text">{{$produit->libelle}}</div>
                        </div>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 h-100">
                        <h6 class="text-truncate mb-3">{{$produit->libelle}}</h6>
                        <p>
                            Stock: 
                            @if($produit->qttestock > 0)
                                <span class="text-success" title="Excellent produit en stock"><i class="fas fa-check-circle"></i></span> <!-- Green tick for stock available -->
                            @else
                                <span class="text-danger" title="Excellent produit hors stock"><i class="fas fa-times-circle"></i></span> <!-- Red tick for no stock -->
                            @endif
                            {{ $produit->qttestock }}
                            @if($produit->qttestockbonetat > 0)
                                <span class="text-warning" title="Bonne qualite en stock"><i class="fas fa-check-circle"></i></span> <!-- Green tick for stock available -->
                            @else
                                <span class="text-danger" title="Bonne qualite hors stock"><i class="fas fa-times-circle"></i></span> <!-- Red tick for no stock -->
                            @endif
                            {{ $produit->qttestockbonetat }}
                            @if($produit->qttestocketatcorrect > 0)
                                <span class="text-primary" title="Correct produit en stock"><i class="fas fa-check-circle"></i></span> <!-- Green tick for stock available -->
                            @else
                                <span class="text-danger" title="Correct produit hors stock"><i class="fas fa-times-circle"></i></span> <!-- Red tick for no stock -->
                            @endif
                            {{ $produit->qttestocketatcorrect }}
                        </p>
                        <div class="d-flex justify-content-center">
                            <h6 class="me-2"><strong>{{$produit->prix}} FCFA</strong></h6>
                            <h6 class="text-muted ml-2"><del>{{$produit->prix + $produit->prix / 2}} FCFA</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="/detailprod/{{$produit->id}}" class="btn btn-sm text-dark p-0 fas fa-beat">
                            <i class="fas fa-eye text-primary mr-1"></i>View Detail
                        </a>
                        <a data-id="{{$produit->id}}" class="btn btn-sm text-dark p-0 add-to-cart-btn">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class=" my-5">
    <div class="row ms-md-5 ps-md-5 text-center brand-grid">
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/samsung-logo.png" alt="Samsung">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/xiaomi-logo.png" alt="Xiaomi">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/xiaomi-logo.png" alt="Xiaomi">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/infinix-logo.png" alt="Infinix">
            </div>
        </div>
        <div class="col-6 col-md-2 d-none d-md-block">
            <div class="brand-item">
                <img src="path-to-your-images/huawei-logo.png" alt="Huawei">
            </div>
        </div>                
    </div>
    <div class="row ms-md-5 ps-md-5 text-center brand-grid">
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/samsung-logo.png" alt="Samsung">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/xiaomi-logo.png" alt="Xiaomi">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/xiaomi-logo.png" alt="Xiaomi">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="brand-item">
                <img src="path-to-your-images/infinix-logo.png" alt="Infinix">
            </div>
        </div>
        <div class="col-6 col-md-2 d-none d-md-block">
            <div class="brand-item">
                <img src="path-to-your-images/huawei-logo.png" alt="Huawei">
            </div>
        </div>
    </div>
</div>
        <div class="m-md-5 mb-3">
            <div class="row justify-content-center">
                <div class="col-md-12 custom-font">
                    <div class="card">
                        <div class="card-body">                           
                            <p class="card-text" id="short-description">
                                <strong style="font-size: 22px;">Bienvenue dans notre Boutique en Ligne</strong><br><br>
                                Découvrez une vaste sélection de produits de qualité conçus pour répondre à tous vos besoins. Que vous soyez à la recherche des luminaires, des groupes électrogènes, des caméras, des téléphones, des générateurs, des marteaux piqueurs, des moto pompe, d&apos;équipements pour la maison, de matériel électrique et bien d&apos;autres, notre boutique a tout ce qu'il vous faut.                                                                </p>
                            <p class="card-text more-content" id="more-description" style="display: none;">
                                <strong style="font-size: 21px;">Nos Catégories de Produits</strong><br>
                                <strong>Groupes Électrogènes :</strong> Assurez votre autonomie énergétique avec nos modèles fiables, adaptés à tous les usages, qu'ils soient résidentiels ou professionnels. <br>
                                <strong>Téléphones et Caméras :</strong> Explorez notre gamme de téléphones dernier cri et de caméras de haute qualité pour capturer vos moments précieux. <br>
                                <strong>Moto-Pompes :</strong> Idéales pour l'irrigation et le drainage, nos moto-pompes offrent performance et efficacité.<br>
                                <strong>Marteaux Piqueurs :</strong> Retrouvez des marteaux piqueurs robustes pour vos travaux de démolition et de construction.<br>
                                <strong>Luminaires :</strong> Ajoutez une touche d&apos;éclat à votre espace avec notre sélection de luminaires modernes et fonctionnels.<br> <br>

                                <strong style="font-size: 21px;"> Pourquoi Choisir Notre Boutique ?</strong><br>
                                <strong>Qualité Garantie :</strong> Nous proposons des produits sélectionnés parmi les meilleures marques pour garantir votre satisfaction. <br>
                                <strong>Service Client Écoute :</strong> Notre équipe est là pour vous accompagner et répondre à toutes vos questions, vous aidant à faire le meilleur choix. <br>
                                <strong>Expérience d'Achat Fluide :</strong> Profitez d'une navigation facile chez vous. <br> <br>
                                <strong style="color: red;font-size: 18px;">Ne manquez pas de parcourir notre boutique pour découvrir des offres exclusives et des produits qui simplifient votre quotidien. Faites confiance à notre expertise et à notre engagement pour vous offrir le meilleur !</strong>
                            </p>
                            <a href="#" class="btn btn-primary" id="toggle-button-nad">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Lien vers Bootstrap JS et Popper.js -->


        @include('footer1')

        <script>
            document.getElementById('toggle-button-nad').addEventListener('click', function (event) {
                event.preventDefault();
                var moreContent = document.getElementById('more-description');
                var shortDescription = document.getElementById('short-description');
                var button = document.getElementById('toggle-button-nad');
    
                if (moreContent.style.display === 'none') {
                    moreContent.style.display = 'block';
                    button.textContent = 'Voir moins';
                } else {
                    moreContent.style.display = 'none';
                    button.textContent = 'Voir plus';
                }
            });
        </script>
   
       
        <script>
            // Initialisation du carrousel sans défilement automatique
            var myCarousels = document.querySelector('#carouselExampleControls');
            var carousels = new bootstrap.Carousel(myCarousels, {
                interval: false // Désactive le défilement automatique
            });
        
            var myCarousel = document.querySelector('#carouselExampleControls1a');
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: false // Désactive le défilement automatique
            });
            var myCarousel2 = document.querySelector('#carouselExampleControls1b');
            var carousel2 = new bootstrap.Carousel(myCarousel2, {
                interval: true // Désactive le défilement automatique
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart-btn').click(function(e) {
            console.log('ffff');
            e.preventDefault(); // Prevent the page from refreshing
            
            var productId = $(this).data('id'); // Get product ID from the data attribute
            
            $.ajax({
                url: '/addtocard/' + productId,
                type: 'GET', // Use 'POST' if you're submitting form data
                success: function(response) {
                    // console.log(document.getElementById('nouv')); 
                    // document.getElementById('nouv').value = response.cartQuantity;
                    const titleElement = document.getElementById('nouv');
                    // alert(titleElement.textContent);
                    // Update cart info (you can modify this based on your app's structure)
                    // alert(response.cartQuantity); // or update cart count, etc.
                        titleElement.textContent = response.cartQuantity;
                }, 
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        });
    });
</script>

</body>
</html>











































{{-- <div class="container mt-5">
    <div id="carouselExampleControls" class="carousel slide">
        <div class="carousel-inner">
            @foreach($produits->chunk(4) as $index => $chunk)
                <div class="carousel-item ms-lg-5 ps-lg-5 {{ $index === 0 ? 'active' : '' }}">
                    <div class="row">

                        <div class="col-lg-1 col-md-2 col-sm-6 pb-1"></div>

                        @foreach($chunk as $product)
                            




                                <div class="">
                                    <div class="card product-item border-0 mb-4 shadow-sm"  style="height: 250rem;">
                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent p-0 text-center ">
                                            @foreach($product->images as $img)
                                           
                
                                            <img class="img-fluid w-75 h-100" style="width:100%;" src={{ asset('photos/'.$img->nom) }} alt="" >
                                            @break
                                            @endforeach
                
                                        </div>
                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
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
                                            <h6 class="me-2">       <span id="prix" class="text-danger fw-bold" style="font-size: 20px;">{{$product->prix}} FCFA</span>                                                            </h6><h6 class="text-muted ml-2"><del>{{$product->prix+$product->prix/2}}</del></h6>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between bg-light border">
                                            <a href="/detailprod/{{$product->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                            <a  href="#" data-id="{{$product->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                </div>


                               



                        @endforeach
                        <div class="col-lg-1 col-md-2 col-sm-6 pb-1"></div>

                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>







<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    // Initialisation du carrousel sans défilement automatique
    var myCarousel = document.querySelector('#carouselExampleControls');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: false // Désactive le défilement automatique
    });
</script> --}}
