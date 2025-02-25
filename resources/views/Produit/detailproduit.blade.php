<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <style>
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
            transition: transform 0.3s, box-shadow 0.3s;
            width: 27vh;
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
            height: 14rem;
            object-fit: cover;

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

        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            /* S'assure que le body prend toute la hauteur */
            box-sizing: border-box;
            /* Ensure consistent box-sizing */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-center {
            display: flex;
            justify-content: center;
        }

        .product-item {
            flex: 0 0 calc(33.33% - 1rem);
            /* Three products per row for tablet */

        }

        .main-content {
            flex: 1;
            /* Prend tout l'espace restant */
            display: flex;
            justify-content: center;
            /* Centre horizontalement */
            align-items: center;
            /* Centre verticalement, si nécessaire */
            flex-direction: column;
            /* Pour un layout en colonne */
            padding-left: 80px;
            /* Ajuste cette valeur pour augmenter l'espace à gauche */
            padding-right: 80px;
            /* Ajuste cette valeur pour augmenter l'espace à droite */
        }

        .product>div {
            display: flex;
            flex-wrap: wrap;
            /* Pour permettre le passage à la ligne des produits */
            justify-content: center;
            /* Centre les produits horizontalement */

        }

        .add-to-cart-container {
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .add-to-cart-container:hover .add-to-cart-btn {
            transform: translateY(-10px);
            color: #ff0000;
            /* Changer la couleur lors du survol */
        }


        /* Responsive Styles */
        @media (max-width: 768px) {
            body {
                font-size: 14px;
                /* Adjusting font size for smaller screens */
            }

            .card {
                height: 60vh;
                /* Keep the card's height at 60% of the viewport height */
                overflow: hidden;
                /* Prevent overflow and keep the content inside the card */
            }

            .product-img {
                position: relative;
                height: 20vh;
                /* Keep image height to 20% of the viewport height */
            }

            .product-item {
                width: 100%;
                /* Full width of the parent container */
                height: auto;
                /* Allow the height to adjust automatically */
                margin-bottom: 20px;
                /* Space between product items */
            }

            .product-img img {
                width: 100%;
                /* Ensure the image takes up the full width of the container */
                height: 10rem;
                /* Make the image stretch to fit the container's height */
                object-fit: cover;
                /* Ensure the image covers the container without distortion */
            }

            .main-content {
                display: flex;
                justify-content: center;
                /* Center content horizontally */
                align-items: flex-start;
                /* Align items to the start of the container */
                flex-direction: column;
                /* Arrange the layout in a column */
                padding-left: 0px;
                padding-right: 0px;
            }
        }


        @media (max-width: 1024px) {
            .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-center {
                display: flex;
                justify-content: center;
            }

            .product-item {
                flex: 0 0 calc(33.33% - 1rem);
                /* Three products per row for tablet */
                margin: 0.5rem;
                /* Add some space between cards */
            }
        }

        @media (min-width: 992px) {

            /* Pour les écrans larges */
            .product>div {
                flex: 0 0 20%;
                /* Chaque élément prendra 20% de la largeur */
                max-width: 20%;
                /* Limite la largeur maximale */

            }

        }


        .product-details {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            /* Permet aux cartes de passer à la ligne si nécessaire */

        }

        .image-card {
            width: 50%;
            /* Pour les écrans larges */
            padding: 10px;
            position: relative;
            /* Pour le positionnement des éléments internes */

        }

        .info-card {
            width: 50%;
            /* Pour les écrans larges */
            padding: 10px;

        }

        #main-image {
            width: 100%;
            /* Prend toute la largeur de son conteneur */
            height: 55vh;
            /* Garde le ratio */
            object-fit: contain;
        }

        .thumbnail-container {
            display: flex;
            justify-content: start;
            margin-top: 10px;
            /* Espace entre la grande image et les miniatures */
        }

        .thumbnail {
            width: 100px;
            /* Largeur des images miniatures */
            height: 100px;
            /* Hauteur des images miniatures */
            margin-right: 10px;
            /* Espace entre les miniatures */
            cursor: pointer;
            /* Change le curseur pour montrer que c'est cliquable */
        }

        .thumbnail:hover {
            opacity: 0.7;
            /* Effet de survol */
        }

        /* Conteneur de la galerie (les images sont disposées horizontalement) */
        .thumbnail-container {
            display: flex;
            /* Utilisation de Flexbox pour aligner les images horizontalement */
            overflow-x: auto;
            /* Active le défilement horizontal */
            gap: 15px;
            /* Espacement entre les images */
            padding: 10px 0;
            /* Espacement interne du conteneur */
            scroll-snap-type: x mandatory;
            /* Active l'effet "snap" pour aligner chaque image lors du défilement */
            -webkit-overflow-scrolling: touch;
            /* Pour un défilement fluide sur iOS */
        }

        /* Personnalisation de la scrollbar (optionnel) */
        .thumbnail-container::-webkit-scrollbar {
            height: 8px;
            /* Hauteur de la barre de défilement */
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        #bt1:hover {
            background-color: rgb(13, 94, 67);
            color: white;
            border-radius: 30px;
        }

        #bt1 {
            border-radius: 30px;
            border: solid 2px rgb(13, 94, 67);
            ;
        }

        #buttonx:hover {
            color: rgb(28, 201, 43);
        }

        /* Masquer la description au départ */
        .description-content {
            display: none;
            margin-top: 10px;
        }

        /* Style du bouton avec la flèche */
        .toggle-description {
            background-color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
        }


        /* Media query pour les écrans de moins de 768px */
        @media (max-width: 768px) {

            .image-card,
            .info-card {
                width: 100%;
                /* Les cartes prennent toute la largeur */
            }

            /* Ajuster la taille des colonnes sur mobile */
            .col-6.col-md-4.col-lg-2 {
                padding-left: 0px;
                padding-right: 5px;
            }
        }
    </style>

    <title>Details produits</title>

</head>

<body style="background-color:rgba(227, 220, 220, 0.236);">

    @include('header', ['souscategories' => $souscategories])
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <div class="">
        <div class="product-details">
            <div class="image-card col-md-6 col-12">
                <img id="main-image" src="{{ asset('photos/' . $produits->images->first()->nom) }}"
                    alt="Produit principal" class="img-fluid">

                <div class="thumbnail-container">
                    @foreach ($produits->images as $img)
                    <img src="{{ asset('photos/' . $img->nom) }}" class="thumbnail" alt="Image miniature">
                    @endforeach
                </div>
            </div>

            <div class="info-card ">
                <h2>{{ $produits->categorie->nomCat }} - {{ $produits->libelle }} </h2> <br>

                <p>
                    <b style="color: rgb(13, 94, 67);">Caracteristiques</u></b>
                <ul>
                    @foreach ($produits->caracteristique as $cate)
                        @if ($cate->nomCaract == "NULL")
                        <P style="color: rgb(218, 9, 9);font-size:30px; text-align:center;"><b>NULL</b></P>
                        @else
                        <li style="color: rgb(28, 34, 32);">{{ $cate->nomCaract }}</li>
                        @endif
                    @endforeach
                </ul>
                </p>


                <div class="row  ">
                    <b id="etat" style="color: rgb(25, 105, 78)">Excellent Etat</b>
                    <div class="row ">
                        <div class=""><i class="fas fa-star" style=" color:#e5bd58; "></i><i class="fas fa-star"
                                style=" color:#e5bd58; "></i><i class="fas fa-star" style=" color:#e5bd58; "></i><i
                                class="fas fa-star" style=" color:#e5bd58; "></i><i class="fas fa-star"
                                style=" color:#e5bd58; "></i></div>
                    </div>
                    <p class="text-center ">
                        <b>Stock:</b>&nbsp;
                        @if ($produits->qttestock > 0)
                        <span class="text-success" title="Excellent produit en stock"><i
                                class="fas fa-check-circle"></i></span> <!-- Green tick for stock available -->
                        @else
                        <span class="text-danger" title="Excellent produit hors stock"><i
                                class="fas fa-times-circle"></i></span> <!-- Red tick for no stock -->
                        @endif
                        {{ $produits->qttestock }}&nbsp;&nbsp;
                        @if ($produits->qttestockbonetat > 0)
                        <span class="text-warning" title="Bonne qualite en stock"><i
                                class="fas fa-check-circle"></i></span> <!-- Green tick for stock available -->
                        @else
                        <span class="text-danger" title="Bonne qualite hors stock"><i
                                class="fas fa-times-circle"></i></span> <!-- Red tick for no stock -->
                        @endif
                        {{ $produits->qttestockbonetat }}&nbsp;&nbsp;
                        @if ($produits->qttestocketatcorrect > 0)
                        <span class="text-primary" title="Correct produit en stock"><i
                                class="fas fa-check-circle"></i></span> <!-- Green tick for stock available -->
                        @else
                        <span class="text-danger" title="Correct produit hors stock"><i
                                class="fas fa-times-circle"></i></span> <!-- Red tick for no stock -->
                        @endif
                        {{ $produits->qttestocketatcorrect }}
                    </p>

                    <div hidden id="test">{{ number_format($produits->prix, 0, ',', ',') }} FCFA</div>
                    <div hidden id="test2">{{ number_format($produits->prixbonetat, 0, ',', ',') }} FCFA</div>
                    <div hidden id="test3">{{ number_format($produits->qttestocketatcorrect, 0, ',', ',') }} FCFA
                    </div>

                    <div class=" d-flex justify-content-center  mt-1">
                        <button class="btn button1 bg-success mx-1"
                            style="background-color: white; border-color:rgb(25, 105, 78); color:white; border:none"
                            id="buttonx " onclick="changeContent1()">Excellent état</button>
                        <button class="btn button2 bg-warning mx-1"
                            style="background-color: white; border-color: rgb(20, 112, 81); color:white; border: none;"
                            id="buttonx" onclick="changeContent2()">Très bon état</button>
                        <button class="btn button3 bg-primary mx-1"
                            style="background-color: white; border-color: rgb(13, 94, 67); color:white; border: none;"
                            id="buttonx" onclick="changeContent3()">État Correct</button>
                    </div>
                </div>
                <br>

                <div class="col-12 ">
                    @php
                    $nombre = $produits->prix;
                    $nombreEntier = (int) $nombre;
                    $ancienp = $nombreEntier + $nombreEntier / 2;
                    @endphp
                    <div class="text-center ">
                        <span class="me-3" id="prixreduit"
                            style="font-size: 25px; text-decoration: line-through; text-decoration-color: black; text-decoration-thickness: 2px; text-align: center; display: inline-block; vertical-align: 0.2em;">
                            <?php echo number_format($ancienp, 0, ',', '.'); ?>
                            FCFA
                        </span> &nbsp; &nbsp;&nbsp;&nbsp;
                        
                        <span id="prix" class="text-danger fw-bold" style="font-size: 35px;">
                        <sup><small style="font-size: 20px;">Prix Unitaire</small></sup>

                            <?php echo number_format($nombreEntier, 0, ',', ','); ?>
                            FCFA
                        </span>
                        <br><br>
                        <form action="{{ route('addtocart2') }}" type="submit" method="post">
                            @csrf
                            <h4> <label for="">Quantité :</label>
                                <input type="number" class="" style="width: 60px" value=1 min=1 name="quantite"><br>
                                <input type="text" hidden class=" " style="width: 65px" value="excellentetat"
                                    name="etat" id="etatprod"><br>
                            </h4>
                            <input type="text " hidden value="{{ $produits->id }}" name="id">
                            <span class="center-text" style="font-size: 13px;"><i class="fas fa-car-side"
                                    style=" color: rgb(13, 94, 67); "></i>Récupération dans nos
                                locaux</span>
                            <br>
                            <b style="color: rgb(13, 94, 67); ">Plus de 50 commandes en cours</b><br>


                            <div class="d-flex justify-content-center  mt-1">
                                <button class="btn btn-danger btn rounded-pill mt-3" style="width: 30vh; color: white;"
                                    type="submit">
                                    Ajouter au panier
                                </button>
                                <button id="scrollButton" style="border: none;  ">
                                    <a href="#">
                                        <input type="button" id="bt1" value="Description du produit"
                                            class="btn rounded-pill mt-3" onclick="activateMenuItem(this)">
                                    </a>
                                </button>

                            </div>
                        </form>
                        <br>
                        <div class="row">
                            <h5><strong>Information de Récupération</strong></h5>
                            <span class="ms-2">Récupérer vos produits dans tous nos points de vente</span>
                            {{-- <span class="center-text ms-5" style="font-size: 13px;"><i
                                    class="fas fa-car-side mt-1 me-1"></i>Livraison gratuite</span> --}}
                            <span class="ms-2"><i class="fas fa-home home-icon mt-1 me-1"
                                    style="color: rgb(13, 94, 67);"> </i> Récupération dans un délai de 48H</span>
                            <span class="ms-2 "><i class="fas fa-map-marker-alt icon mt-1 me-1"
                                    style="color: rgb(13, 94, 67);"></i> Cameroun - Douala Bonabéri Face Ancien Cinéma
                                Fohato</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <main class="main-content">
            <div class="col-md-12 mt-4 px-0">
                <div id="carouselExampleControls" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($products->chunk(5) as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center mx-0">
                                @foreach ($chunk as $product)
                                <div class="col-6 col-md-4 col-lg-2">
                                    <a href="/detailprod/{{ $product->id }}"
                                        class="btn btn-sm text-dark p-0 fas fa-beat">
                                        <div class="card product-item border-0 mb-4 shadow-sm">
                                            <div
                                                class=" product-img position-relative overflow-hidden bg-transparent p-0 text-center h-100">
                                                @foreach ($product->images as $img)
                                                <img class="img-fluid" src="{{ asset('photos/' . $img->nom) }}" alt="">
                                                @break
                                                @endforeach
                                                <div class="overlay">
                                                    <div class="text">{{ $product->libelle }}</div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h6 class="text-truncate mb-3">{{ $product->libelle }}</h6>
                                                <p>Stock:
                                                    @if ($product->qttestock > 0)
                                                    <span class="text-success" title="Produit en stock"><i
                                                            class="fas fa-check-circle"></i></span>
                                                    @else
                                                    <span class="text-danger" title="Produit hors stock"><i
                                                            class="fas fa-times-circle"></i></span>
                                                    @endif
                                                    {{ $product->qttestock }}
                                                    @if ($product->qttestockbonetat > 0)
                                                    <span class="text-warning" title="Bonne qualite en stock"><i
                                                            class="fas fa-check-circle"></i></span>
                                                    <!-- Green tick for stock available -->
                                                    @else
                                                    <span class="text-danger" title="Bonne qualite hors stock"><i
                                                            class="fas fa-times-circle"></i></span>
                                                    <!-- Red tick for no stock -->
                                                    @endif
                                                    {{ $product->qttestockbonetat }}
                                                    @if ($product->qttestocketatcorrect > 0)
                                                    <span class="text-primary" title="Correct produit en stock"><i
                                                            class="fas fa-check-circle"></i></span>
                                                    <!-- Green tick for stock available -->
                                                    @else
                                                    <span class="text-danger" title="Correct produit hors stock"><i
                                                            class="fas fa-times-circle"></i></span>
                                                    <!-- Red tick for no stock -->
                                                    @endif
                                                    {{ $product->qttestocketatcorrect }}
                                                </p>

                                                <div
                                                    class="card-body p-3 d-flex justify-content-between align-items-center">
                                                    <div class="text-start">
                                                        <!-- Texte à gauche -->
                                                        <h5 class="me-2 mb-1" style="font-size: 15px;"><span
                                                                class="fs-6 text-danger fw-bold">
                                                                <?php echo number_format($product->prix, 0, ',', ','); ?>
                                                                FCFA</strong></h5>
                                                        <h7 class="text-muted"><del>
                                                                <?php echo number_format($product->prix + $product->prix / 2, 0, ',', ','); ?>
                                                                FCFA
                                                            </del>
                                                        </h7>
                                                    </div>
                                                    <!-- Icône ou autre élément à droite -->
                                                    <div class="add-to-cart-container">
                                                        <i data-id="/detailprod/{{ $product->id }}"
                                                            class="add-to-cart-btn fas fa-shopping-cart text-primary mr-1"
                                                            style="font-size: 1.5rem;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Contrôles du carrousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true">
                            <i class="fas fa-chevron-left"
                                style="color: black; background-color: white; padding: 12px;"></i>
                        </span>
                        <span class="visually-hidden">Précédent</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true">
                            <i class="fas fa-chevron-right"
                                style="color: black; background-color: white; padding: 12px;"></i>
                        </span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            </div>
        </main>

        <div id="targetDiv">
            <div class="">
                <div class="card col-12">
                    <div class="card-header d-flex justify-content-between align-items-center product-description"
                        style="background-color:  white;">
                        <h3 style="color:#ca8f30;"> <strong> DESCRIPTION DU PRODUIT </strong></h3>
                        <button class="toggle-description">
                            <i class="fas fa-chevron-down"></i> <!-- Flèche vers le bas -->
                        </button>
                    </div>
                    <div class="description-content" style="display: none;">
                        <!-- Masqué initialement -->
                        <p class="product-description"><b>{{ $produits->description }}</b>
                            <i class="bi bi-check-circle text-success"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div> <br>
        <style>
            /* Mise en forme générale de la description du produit */
            .product-description {
                font-family: 'Arial', sans-serif;
                /* Police lisible */
                font-size: 1rem;
                /* Taille de la police pour une lecture confortable */
                line-height: 1.6;
                /* Espacement entre les lignes */
                color: #333;
                /* Couleur sombre du texte */
                white-space: pre-line;
                /* Gère les retours à la ligne dans le texte */
                margin-bottom: 20px;
                /* Espacement entre la description et les autres éléments */
            }

            /* Optionnel : ajouter un fond léger et une bordure pour délimiter la description */
            .product-description {
                padding: 15px;
                /* Padding pour un peu d'espace autour du texte */
                background-color: #f9f9f9;
                /* Fond léger */
                border: 1px solid #ddd;
                /* Bordure légère */
                border-radius: 8px;
                /* Coins arrondis pour un aspect plus doux */
            }
        </style>




        <script>
            // Lorsque l'utilisateur clique sur le bouton pour défiler vers la description
        document.getElementById('scrollButton').addEventListener('click', function(event) {
            event.preventDefault(); // Empêche l'action par défaut (rechargement de la page)

            // Défiler en douceur vers la section de la description
            document.getElementById('targetDiv').scrollIntoView({
                behavior: 'smooth'
            });

            // Après le défilement, ouvrir la description automatiquement
            setTimeout(function() {
                var toggleButton = document.querySelector('.toggle-description');
                var content = document.querySelector('.description-content');

                // Si la description est masquée, l'afficher
                if (content.style.display === 'none' || content.style.display === '') {
                    content.style.display = 'block'; // Afficher la description
                    toggleButton.innerHTML = '<i class="fas fa-chevron-up"></i>'; // Flèche vers le haut
                }
            }, 500); // Attendre 500ms après le défilement pour garantir que la section est arrivée en vue
        });

        // Code pour gérer l'ouverture/fermeture de la description via la flèche
        document.querySelector('.toggle-description').addEventListener('click', function() {
            var content = document.querySelector('.description-content');

            // Si la description est masquée, on l'affiche
            if (content.style.display === 'none' || content.style.display === '') {
                content.style.display = 'block';
                this.innerHTML = '<i class="fas fa-chevron-up"></i>'; // Flèche vers le haut
            } else {
                // Sinon, on la cache
                content.style.display = 'none';
                this.innerHTML = '<i class="fas fa-chevron-down"></i>'; // Flèche vers le bas
            }

            // Ajouter ou supprimer la classe "active" pour changer la direction de la flèche
            this.classList.toggle('active');
        });
        </script>




        @include('footer1')


        <script>
            // Initialisation du carrousel sans défilement automatique
        var myCarousels = document.querySelector('#carouselExampleControls');
        var carousels = new bootstrap.Carousel(myCarousels, {
            interval: false // Désactive le défilement automatique
        });

        document.getElementById('scrollButton').addEventListener('click', function() {
            document.getElementById('targetDiv').scrollIntoView({
                behavior: 'smooth'
            });
        });


        document.querySelectorAll('.thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('mouseover', function() {
                const mainImage = document.getElementById('main-image');
                mainImage.src = this.src; // Change la source de l'image principale
            });
        });

        function changeContent1() {
            document.getElementById('etat').innerText = "Reconditionné - Excellent Etat";
            var divContent = document.getElementById('test').innerHTML;
            document.getElementById('etatprod').value = "excellentetat";


            document.getElementById('prix').innerText = divContent;

        }

        function changeContent2(newContent) {
            document.getElementById('etat').innerText = "Reconditionné - Bonne Etat";
            var divContent = document.getElementById('test2').innerHTML;
            document.getElementById('etatprod').value = "bonetat";

            document.getElementById('prix').innerText = divContent;
        }

        function changeContent3() {
            document.getElementById('etat').innerText = "Reconditionné - Etat Correct";
            var divContent = document.getElementById('test3').innerHTML;
            document.getElementById('etatprod').value = "correctetat";

            document.getElementById('prix').innerText = divContent;
        }
        </script>

</body>

</html>