<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Responsive</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #2914FA; /* Fond bleu */
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
    </style>
</head>
<body>
    <!-- Contenu de la page -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>À propos</h5>
                    <p>Nous sommes une entreprise dédiée à fournir les meilleures solutions pour nos clients.</p>
                </div>
                <div class="col-md-4">
                    <h5>Liens</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Adresse : 123 Rue Exemple, Ville, Pays</p>
                    <p>Téléphone : +123 456 7890</p>
                    <p>Email : <a href="mailto:contact@exemple.com">contact@exemple.com</a></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <p>&copy; 2024 Mon Entreprise. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
