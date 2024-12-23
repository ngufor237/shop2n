<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Exemple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Styles -->

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            box-sizing: border-box;
            overflow-x: hidden;
            /* Ensure consistent box-sizing */
        }
        .header {
            background-color: #ca8f30;
            /* Couleur principale */
            color: black;
            padding: 10px 0;

            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .search-bar {
            max-width: 800px;
            width: 100%;
        }

        .header .search-bar input {
            border-radius: 50px 0 0 50px;
            border: none;
            padding: 10px;
        }

        .header .search-bar button {
            border-radius: 0 50px 50px 0;
            border: none;
        }

        .header .navbar-brand {
            font-weight: bold;
        }

        .header .icon-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: black;
            border: none;
            background: transparent;
            padding: 10px;
        }

        .header .icon-link i {
            font-size: 1.5rem;
            /* Taille de l'icône */
            margin-bottom: 5px;
        }

        .header .right-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header .secondary-menu {
            background-color: white;
            /* Couleur secondaire */
            color: black;
            padding: 10px 0;
        }

        .header .secondary-menu input[type="button"] {
            background-color: transparent;
            border: none;
            color: black;
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 50px;
        }

        .header .secondary-menu input[type="button"].active {
            background-color: #ca8f30;
            /* Couleur de fond lorsqu'on clique */
            color: white;
        }

        .header .secondary-menu input[type="button"]:focus {
            outline: none;
        }

        /* Styles pour la barre latérale */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: #fff;
            color: #000;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 1.25em;
            color: #000;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #d9d9e1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color: #ca8f30;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: white;
            color: black;
            padding: 10px 15px;
            border: none;
        }

        .openbtn.active {
            background-color: #ca8f30;
            color: white;
        }

        .text-decoration-none {
            text-decoration: none;
        }

        .custom-h1 {
            font-size: 2rem;
            /* Taille du texte */
            color: #fff;
            /* Couleur du texte */
        }

        /* Sidebar container */

        .menu-item {
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            display: block;
        }

        .menu-item:hover {
            background-color: #ca8f30;
            cursor: pointer;
        }

        /* Submenu styling */
        .submenus {
            position: relative;
        }

        .submenu {
            display: none;
            position: absolute;
            left: 250px;
            /* Align next to the sidebar */
            top: 0;
            width: 300px;
            background-color:#ca8f30;
            color: white;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .submenu.show {
            display: block;
        }




        .search-container {
    position: relative;
    max-width: 600px;
    margin: 0 auto;
}

#searchResultsContainer {
    position: absolute;
    background: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-height: 400px;
    overflow-y: auto;
    border-radius: 8px;
    z-index: 1000;
}

.result-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #f0f0f0;
}

.result-item:last-child {
    border-bottom: none;
}

.result-left img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.result-right {
    margin-left: 10px;
}

.result-title {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
    color: #546364;
}

.result-description {
    font-size: 14px;
    margin: 5px 0;
    color: #666;
}

.result-price {
    color: #28a745;
    font-weight: bold;
}

.result-price-old {
    text-decoration: line-through;
    color: #999;
    margin-left: 5px;
}

.little-screens {
        display: none;
    }
.midium-above {
    display: block;
}
/*
.lvl1{
        background-color: blue;
    }
.lvl2{
    background-color: green;
    padding: 1rem;
}
.lvl3{
    background-color: brown;
} 
*/


@media (max-width: 768px) {
    .little-screens {
        display: block;
        /*
        background-color:red;
        */
    }
    .midium-above {
        display: none;
    }

}
@media (max-width: 1210px) {
    .lvl3{
    position: relative;
    }
    .lvl3 .divshop{
        position: absolute;
        top: 0;
        left: 20px;
    }
    .lvl3 .divshop h1{
        font-size: 1.5rem;
    }
    .lvl3 .rlogos{
        position: absolute;
        top: 0;
        right: 30px;
    }
    .lvl3 .rlogos .right-menu {
        max-width: 100px;
    }
    .lvl3 .rlogos .right-menu {
    font-size: 0.6rem; /* Reduced font size */
    padding: 0; /* Reduced padding */
    }

    .lvl3 .rlogos .right-menu .icon-link {
        padding: 0.5rem 0; /* Reduced padding */
        margin-right: -2rem; /* Reduced margin between links */
    }

    .lvl3 .rlogos .right-menu .icon-link i {
        font-size: 1rem; /* Adjusted icon size */
    }

    .lvl3 .rlogos .right-menu .btn i {
        font-size: 0.8rem; /* Adjusted shopping cart icon size */
    }

}

    </style>
</head>

<body>

    <!-- Header Section -->
    <header class="header ">
        <div class="container-fluid midium-above py-3 lvl1">
            <div class="justify-content-between align-items-center lvl2">
                {{-- <a class="navbar-brand" href="#"> --}}
                <div class="row lvl3">
                    <div class="col-auto mb-3 divshop">

                        <a href="/maincontain"  id="TOPOFPAGE" class="text-decoration-none nshop">
                            <h1 class="m-0 custom-h1"><span class="text-white font-weight-bold border px-3 mr-1 ittext">2N
                                    SHOP</span></h1>
                        </a>
                    </div>

                    <div class="col-4 col-md-5 col-lg-6 col-xxl-7 mb-3 divsearch">

                    <div class="search-container">
                        <form class="d-flex search-bar mx-auto" onsubmit="return false;">
                            <input class="form-control" type="search" id="searchInput" placeholder="Qu'est-ce qui vous ferait plaisir ?" aria-label="Search" onkeyup="searchProducts()">
                            <button class="btn btn-danger" type="button" onclick="searchProducts()">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                        <div id="searchResultsContainer" style="display: none;">
                            <div id="searchResults"></div>
                        </div>
                    </div>


                    </div>

                    <!-- Header des grand écrans -->
                    <div class="col-auto rlogos">
                        <div class="col-auto ">
                            @guest

                                <div class="right-menu">
                                    <a href="{{ route('login') }}" class="icon-link"
                                        style="all: none; text-decoration: none;">
                                        <i class="bi bi-person icon-margin"></i>
                                        Connecter
                                    </a>


                                    <a href="{{ route('signin') }}" class="icon-link ms-4" style="text-decoration: none;">
                                        <i class="bi bi-person"></i>
                                        S'inscrire
                                    </a>

                                    <div class="col-lg-1 col-2 text-right acart">
                                        <a href="/cardshopping" class="btn  position-relative "
                                            style="text-decoration: none; ">
                                            <i class="fas fa-shopping-cart" style="color:white ;"></i>
                                            <span
                                                id="nouv"class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ count(session()->get('cart', [])) }}
                                            </span>
                                        </a>
                                    </div>


                                </div>
                            @endguest



                            @Auth
                                <div class="right-menu d-flex ">
                                    <a href="
                    @if (Auth::user()->statut == 'admin') {{ route('admin') }} 
                        @elseif (Auth::user()->statut == 'secretaire')
                            {{ route('secretaire') }} @endif
                "
                                        class="icon-link" style="text-decoration: none;">
                                        <i class="fa fa-user" style="color:white; font-size: 1.5rem;"></i>
                                        {{ \Illuminate\Support\Facades\Auth::user()->name }}

                                    </a>

                                    <div class="col-lg-1 col-1 text-right">
                                        <a href="/cardshopping" class="btn position-relative"
                                            style="text-decoration: none;">
                                            <i class="fas fa-shopping-cart" style="color:white; font-size: 1.5rem;"></i>
                                            <span id="nouv"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ count(session()->get('cart', [])) }}
                                            </span>
                                        </a>
                                    </div>

                                    <div class="col-lg-1 col-1 text-right  ms-5">
                                        <form action="{{ route('logout') }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('logout') }}" style="text-decoration: none;"> <i
                                                    class="fas fa-sign-out-alt"
                                                    style="color:white; font-size: 1.5rem;"></i><span class=" d-lg-block">
                                                    <button type="submit" style="all: unset;"> <i style="color:white">
                                                            Logout</i></button> </span> </a>
                                        </form>
                                    </div>

                                </div>
                            @endAuth
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 secondary-menu">
                <nav class="nav">
                    <button class="openbtn" id="rayonsButton" onclick="toggleSidebar()"><i class="bi bi-list"></i> Tous
                        nos rayons</button>
                    <button class="openbtn"><a href="/maincontain"><input type="button" value="Accueil" class="btn"
                                onclick="activateMenuItem(this)"></a></button>

                    @if (@isset($souscategories))


                        @foreach ($souscategories as $souscat)
                            <button class="openbtn"><a href="/produitcate/{{ $souscat->id }}"><input type="button"
                                        value="{{ $souscat->nomCat }}" class="btn" onclick="activateMenuItem(this)"
                                        style="size: 30px;"></a></button>
                        @endforeach
                    @endif
                </nav>
            </div>
        </div>











        <!-- Header des petits écrans -->
        <div class="container little-screens">
            <div class="d-flex justify-content-between align-items-center" style="height: 100px">
                {{-- <a class="navbar-brand" href="#"> --}}
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="search-container">
                            <form class="d-flex search-bar mx-auto" onsubmit="return false;">
                                <input class="form-control" type="search" id="searchInput" placeholder="Qu'est-ce qui vous ferait plaisir ?" aria-label="Search" onkeyup="searchProducts()">
                                <button class="btn btn-danger" type="button" onclick="searchProducts()">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                            <div id="searchResultsContainer" style="display: none;">
                                <div id="searchResults"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mt-3">
                        <a href="/maincontain" style="text-decoration: none;">
                            <h1 class="m-0 custom-h1" style="font-size: 2rem;"><span
                                    class="text-white font-weight-bold border px-1 mr-1">2N</span></h1>
                        </a>
                    </div>




                    <div class="col-10">
                        @guest

                            <div class="right-menu">
                                <a href="/maincontain" class="icon-link" style="text-decoration: none; font-size:9px;">
                                    <i class="bi bi-house"></i>
                                    Accueil
                                </a>
                                <a href="{{ route('login') }}" class="icon-link"
                                    style="text-decoration: none; font-size:9px;">
                                    <i class="bi bi-person"></i>
                                    Connecter
                                </a>
                                <a href="{{ route('signin') }}" class="icon-link "
                                    style="text-decoration: none; font-size:9px;">
                                    <i class="bi bi-person "></i>
                                    S'inscrire
                                </a>

                                <div class="col-lg-1 col-2 text-right ms-n3 position-relative acart" style="left: -30px;">
                                    <a href="/cardshopping" class="btn  position-relative"
                                        style="text-decoration: none; ">
                                        <i class="fas fa-shopping-cart ms-n3"
                                            style="color:white ; font-size: 1.5rem;"></i>
                                        <span
                                            id= "nouv"class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ count(session()->get('cart', [])) }}
                                        </span>
                                    </a>
                                </div>


                            </div>
                        @endguest



                        @Auth
                            <div class="right-menu "style="display:in-block;">


                                    <a href="/maincontain" class="icon-link" style="text-decoration: none; font-size:9px; padding:auto">
                                    <i class="bi bi-house" style="text-decoration: none; font-size:1.7rem;"></i>
                                    Accueil
                                </a>
                                <a href="" class="icon-link" style="text-decoration: none; font-size:9px;">
                                    <i class="fa fa-user" style="text-decoration: none; font-size:1.7rem;"></i>
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }} </a>


                                <a href="/cardshopping" class="btn  position-relative" style="text-decoration: none; font-size:9px;">
                                    <i class="fas fa-shopping-cart" style="color:white; font-size: 1.7rem;"></i>
                                    <span id="nouv"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count(session()->get('cart', [])) }}
                                    </span>
                                </a>

                                <form action="{{ route('logout') }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="#" style="text-decoration: none; font-size:9px;"> <i class="fas fa-sign-out-alt"
                                            style="color:white; font-size: 1.7rem;"></i><span class=" d-lg-block"> <button
                                                type="submit" style="all: unset;"> <i style="color:white">
                                                    LogOut</i></button> </span> </a>
                                </form>




                            </div>
                        @endAuth
                    </div>

                </div>
            </div>
            <div class="d-none d-lg-none d-md-noned-flex justify-content-center mt-3 secondary-menu">
                <!-- faire disparaître le deuxième menu sur écran téléphone -->
                <nav class="nav">
                    <button class="openbtn" id="rayonsButton" onclick="toggleSidebar()"><i class="bi bi-list"></i>
                        Tous nos rayons</button>
                    <a href="/maincontain"><input type="button" value="Accueil" class="btn"
                            onclick="activateMenuItem(this)"></a>

                    {{-- @if (@isset($categories))
                    
               
                @foreach ($categories as $cat)
                <a href="/produitcate/{{$cat->id}}"><input type="button" value="{{$cat->nomCat}}" class="btn" onclick="activateMenuItem(this)"></a>
                @endforeach
                @endif --}}
                </nav>
            </div>
        </div>
    </header>



    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="#" style="background-color: #14363b;color:white" class="w-100 ">&ensp;Nos Categories</a>
        <a href="javascript:void(0)" class="closebtn  " onclick="closeNav()">×</a>
        @foreach ($souscategories1 as $category)
            <a href="/produitcate/{{ $category->id }}" class="menu-item" data-target="submenu{{ $category->id }}">
                <i class="bi bi-camera-video"></i>&ensp;{{ $category->nomCat }}
            </a>
        @endforeach
        <a href="#"><i class="bi bi-camera-video"></i>&ensp;Promo</a>
        <a href="#"><i class="bi bi-camera-video"></i>&ensp;Câble et conducteur</a>
        <a href="#"><i class="bi bi-lightbulb"></i> &ensp;Luminaire</a>
        {{-- <a href="#"><i class="bi bi-tools"></i>&ensp;Outillage</a>
    <a href="#"><i class="bi bi-camera-video"></i>&ensp;Automatisme-Gestion de l'energie</a>
    <a href="#"><i class="bi bi-camera-video"></i>&ensp;Ascenseur-Monte-Charge</a>
    <a href="#"><i class="bi bi-camera-video"></i>&ensp;Vidéo surveillance</a>
    <a href="#"><i class="bi bi-camera-video"></i>&ensp;Carrelage</a> --}}
        <a href="#"><i class="bi bi-camera-video"></i>&ensp;Appareil électroménager</a>
        <a href="#"><i class="bi bi-laptop"></i>&ensp;Matériels informatique</a>
        <a href="#"><i class="bi bi-phone"></i>&ensp;Téléphonie</a>

    </div>
    <!-- <div class="submenus">
    @foreach ($souscategories as $category)
<div id="submenu{{ $category->id }}" class="submenu">
        <p>Details about {{ $category->nomCat }} category.</p>
    </div>
@endforeach
</div> -->
    <script>
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const target = this.getAttribute('data-target');
                document.querySelectorAll('.submenu').forEach(submenu => {
                    submenu.classList.remove('show');
                });
                document.getElementById(target).classList.add('show');
            });

            item.addEventListener('mouseleave', function() {
                const target = this.getAttribute('data-target');
                setTimeout(() => {
                    document.getElementById(target).classList.remove('show');
                }, 300); // Optional delay for smoother UX
            });
        });
    </script>
    <script>
        function activateMenuItem(element) {
            // Désactiver tous les autres éléments de menu
            let items = document.querySelectorAll(
                '.secondary-menu input[type="button"], .right-menu .icon-link, .secondary-menu .openbtn');
            items.forEach(item => item.classList.remove('active'));

            // Activer l'élément cliqué
            element.classList.add('active');

            // Fermer la barre latérale si elle est ouverte
            closeNav();
        }

        function toggleSidebar() {
            const sidebar = document.getElementById("mySidebar");
            const button = document.getElementById("rayonsButton");

            // Désactiver tous les autres boutons du menu
            let items = document.querySelectorAll(
                '.secondary-menu input[type="button"], .right-menu .icon-link, .secondary-menu .openbtn');
            items.forEach(item => item.classList.remove('active'));

            if (sidebar.style.width === "300px") {
                sidebar.style.width = "0";
                button.classList.remove('active');
            } else {
                sidebar.style.width = "300px";
                button.classList.add('active');
            }
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("rayonsButton").classList.remove('active');
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
function searchProducts() {
    const query = document.getElementById('searchInput').value;

    // Avoid making a request for empty input
    if (query.length < 1) {
        document.getElementById('searchResults').innerHTML = ''; // Clear results
        document.getElementById('searchResultsContainer').style.display = 'none'; // Hide results container
        return;
    }

    // Show search results container
    document.getElementById('searchResultsContainer').style.display = 'block';

    // Send AJAX request to the server
    fetch(`/search-products?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            let resultsHtml = '';

            if (data.length > 0) {
                data.forEach(product => {
                    let imageHtml = product.images[0].nom
                        ? `<img class="result-image" src="/photos/${product.images[0].nom}" alt="${product.libelle}" />`
                        : `<img class="result-image" src="/default-placeholder.png" alt="No Image" />`; 

                    resultsHtml += `<a href="/detailprod/${product.id }">
                        <div class="result-item">
                            <div class="result-left">
                                ${imageHtml}
                            </div>
                            <div class="result-right">
                                <h3 class="result-title">${product.libelle}</h3>
                                <p>
                                    <strong class="result-price">${product.prix} FCFA</strong>
                                    ${product.prixbonetat ? `<span class="result-price-old">${product.prixbonetat} FCFA</span>` : ''}
                                </p>
                            </div>
                        </div></a>
                    `;
                });
            } else {
                resultsHtml = '<p>No products found.</p>';
            }

            // Update the results container
            document.getElementById('searchResults').innerHTML = resultsHtml;
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
}


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchResultsContainer = document.getElementById('searchResultsContainer');
    const searchResults = document.getElementById('searchResults');

    // Show search results dynamically
    searchInput.addEventListener('input', function () {
        if (this.value.trim() !== '') {
            searchResultsContainer.style.display = 'block';
        } else {
            searchResultsContainer.style.display = 'none';
        }
    });

    // Close search results when clicking outside
    document.addEventListener('click', function (event) {
        if (!searchResults.contains(event.target) && !searchInput.contains(event.target)) {
            searchResultsContainer.style.display = 'none';
        }
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    // Show search results dynamically
    searchInput.addEventListener('input', function () {
        if (this.value.trim() !== '') {
            searchResults.parentElement.style.display = 'block';
            // You can add AJAX logic to fetch results based on input value.
        } else {
            searchResults.parentElement.style.display = 'none';
        }
    });

    // Close search results when clicking outside
    document.addEventListener('click', function (event) {
        if (!searchResults.contains(event.target) && !searchInput.contains(event.target)) {
            searchResults.parentElement.style.display = 'none';
        }
    });
});

</script>





</body>

</html>
