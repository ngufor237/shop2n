<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Responsive</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #08262b; /* Fond bleu */
            padding: 20px 0;
            color: white; /* Texte en blanc pour plus de contraste */
        }
        .footer a {
            color: #ffffff; /* Lien en blanc */
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: #8BC34A; /* Couleur verte */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            text-decoration: none;
        }

        .social-icons a:hover {
            background-color: #7CB342; /* Un vert légèrement différent au survol */
        }
    </style>
</head>
<body>
    <!-- Contenu de la page -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="font-weight-bold text-white mb-4">À propos</h3>
                    <p class="mb-2">Bienvenue sur notre site ! Nous sommes une boutique
                        en ligne dédiée à vous fournir une vaste sélection
                         de produits de qualité, conçus pour répondre à vos besoins
                          quotidiens.
                    </p>
                    <p class="mb-2">
                        Notre mission est de vous offrir des solutions 
                       fiables et innovantes, que ce soit pour votre maison, votre 
                       jardin ou vos projets professionnels.
                    </p>


                </div>
                <div class="col-md-4">
                    <h3 class="font-weight-bold text-white mb-4">USEFUL LINKS</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white mb-2 text-decoration-none" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white mb-2 text-decoration-none" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-white mb-2 text-decoration-none" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-white mb-2 text-decoration-none" href="/cardshopping"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-white mb-2 text-decoration-none" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-white text-decoration-none" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="font-weight-bold text-white mb-4">CONTACTEZ-NOUS!</h3>
                    <p>Adresse : Ancienne Route Bonaberi En face ancien Cinema FOHATO</p>
                    <p>Téléphones : +237 233 390 876
                       <br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;  +237 694 015 788
                       <br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; +237 691 102 395
                    </p>
                    <p>Site : <a href="https://2ncorporate.com/">www.2ncorporate.com</a></p>
                    <p>Email: info@2ncorporate.com</p>

                    <div class="container text-center mt-5">
                        <div class="social-icons">
                            <a class="text-decoration-none" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="text-decoration-none" href="https://www.facebook.com/2ncorporate/"><i class="fab fa-facebook-f"></i></a>
                            <a class="text-decoration-none" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="text-decoration-none" href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a class="text-decoration-none" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <p>&copy;  Copyright <strong> 2NCORPORATE SARL </strong>. Tous droits réservés.TNB & TWFJ</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
