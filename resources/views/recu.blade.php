<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture - 2N Corporate</title>
    <style>
        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 100px;
        }

        h1 {
            font-size: 28px;
            color: #2d353c;
        }

        .company-details {
            font-size: 14px;
            color: #777;
        }

        .invoice-details,
        .invoice-to,
        .invoice-table {
            margin-bottom: 20px;
        }

        .invoice-table table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f7f7f7;
        }

        .total-price {
            font-size: 20px;
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer1 {
            font-size: 15px;
            border-bottom: 1px solid #ddd;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;


        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <h1>Facture de 2N Corporate</h1>
        </header>

        <div class="invoice-details">
            <p><strong>Nom: {{ $nom }}</strong></p>
            <p><strong>Prenom: {{ $prenom }}</strong></p>
            <p>Date de transaction: <strong>{{ date('m-d-Y') }}</strong></p>
            @php
                $total = 0;
            @endphp
        </div>
        <div class="invoice-table">
            <table>
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Prix Unitaire</th>
                        <th>Quantité </th>
                        <th>État</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['libelle'] }}</td>
                            <td><?php echo number_format($item['prix'], 0, ',', ','); ?> FCFA</td>
                            <td>{{ $item['qttestock'] }}</td>
                            <td>{{ $item['etat'] }}</td>
                            @php
                                $total0 = $item['prix'] * $item['qttestock'];
                            @endphp
                            <td><?php echo number_format($total0, 0, ',', ','); ?>FCFA</td>

                            @php
                                $total += $item['prix'] * $item['qttestock'];
                            @endphp

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="total-price">
            <p><strong>Total à Payer: <?php echo number_format($total, 0, ',', ','); ?> FCFA</strong></p>
        </div>

        <footer class="d-flex justify-content-between align-items-center">
            <div class="footer1 text-start">
                <p>
                    * Delai de paiement 48h <br>
                    * Récupérer vos produits dans tous nos points de vente <br>
                    <strong>Merci pour vos achats..!</strong>
                </p>
            </div>
            <div class="footer">
                <p>
                    2N CORPORATE SARL | DEVANT FOHATO DOUALA-BONABERI ANCIENT ROUTE<br>
                    Tel: +237 233 390 876 / +237 694 015 788 / +237 691 102 395 <br>
                    <a href="http://www.2ncorporate.com">www.2ncorporate.com</a>
                </p>
            </div>
        </footer>

    </div>
</body>

</html>
