<!DOCTYPE html>
<html>
<head>
    <title>Facture de </title>
    <style>
        body { font-size: 20px; }
        thead > tr > th { text-align: center; padding: 5px; }
        td { vertical-align: middle; }
        .container { border: 1px solid #000; }
        .logo { width: 40px; padding-top: 10px; }
        #inventory-invoice { padding: 20px; }
        .invoice { position: relative; background-color: #FFF; min-height: 480px; padding: 12px; }
        .invoice header { padding: 10px 0; margin-bottom: 8px; border-bottom: 1px solid #3989c6; }
        .invoice .company-details { text-align: right; }
        .invoice .company-details .name { margin-top: 0; margin-bottom: 0; }
        .invoice .contacts { margin-bottom: 10px; text-align: center; }
        .invoice .invoice-to { text-align: left; }
        .invoice .invoice-to .to { margin-top: 0; margin-bottom: 0; }
        .invoice .invoice-details { text-align: right; }
        .invoice .invoice-details .invoice-id { margin-top: 0; text-align: center; color: #3989c6; }
        .invoice main { padding-bottom: 30px; }
        .invoice main .thanks { margin-top: -50px; font-size: 2em; margin-bottom: 50px; }
        .invoice main .notices { padding-left: 6px; border-left: 6px solid #3989c6; }
        .invoice main .notices .notice { font-size: 1.2em; }
        .invoice table { width: 90%; border-collapse: collapse; border-spacing: 0; margin-bottom: 10px; }
        .invoice table td,.invoice table th { padding: 10px; background: #eee; border-bottom: 1px solid #fff; }
        .invoice table th { white-space: nowrap; font-weight: 300; font-size: 14px; border:1px solid #fff; }
        .invoice table td { border:1px solid #fff; }
        .invoice table td h3 { margin: 0; font-weight: 300; color: #3989c6; font-size: 1.2em; }
        .invoice table .tax,.invoice table .total,.invoice table .unit { text-align: right; font-size: 1.2em; }
        .invoice table .no { color: #fff; font-size: 1.6em; background: #17a2b8; }
        .invoice table .unit { background: #ddd; }
        .invoice table .total { background: #17a2b8; color: #fff; }
        .invoice table tfoot td { background: 0 0; border-bottom: none; white-space: nowrap; text-align: right; padding: 10px 20px; font-size: 1.2em; border-top: 1px solid #aaa; }
        .invoice table tfoot tr:first-child td { border-top: none; }
        .invoice table tfoot tr:last-child td { color: #3989c6; font-size: 1.4em; border-top: 1px solid #3989c6; }
        .invoice table tfoot tr td:first-child { border: none; }
        .invoice footer { width: 90%; text-align: center; color: #777; font-size: 6px; border-top: 1px solid #aaa; padding: 8px 0; }
        @media print {
            .invoice { font-size: 11px!important; overflow: hidden!important; }
            .invoice footer { position: absolute; bottom: 8px; page-break-after: always; }
            .invoice>div:last-child { page-break-before: always; }
        }
        #watermark { position: fixed; top: 10%; left: 10%; width: 80%; text-align: center; opacity: .2; transform: rotate(10deg); transform-origin: 50% 50%; }
    </style>
</head>
<body>

<div id="watermark">
<!-- <img src="img/logo2n.png" height="80%" width="80%" /> -->

</div>

<div class="container">
    <div class="row text-center">
        <img class="logo" src="logo2n.png" alt="">
        <h6><strong>2N CORPORATE SARL</strong></h6>
        <h6>DEVANT FOHATO DOUALA-BONABERI ANCIENT ROUTE</h6>
        <h6>Tel +237 233 390 876 / +237 694 015 788 / +237 691 102 395</h6>
        <p><h6>www.2ncorporate.com</h6></p>
    </div>

    <div id="inventory-invoice">
        <div class="invoice overflow-auto">
            <div style="min-width: 300px">
                <main>
                    <div class="row contacts">
                        <div class="col invoice-details">
                            <h6 class="invoice-id">RECU de Divine</h6>
                            <p>Date de transaction: <strong>{{ date('Y-m-d') }}</strong></p>
                            <br>
                        </div>
                    </div>

                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="text-left">Libelle</th>
                                <th class="text-left">Prix</th>
                                <th class="text-left">Quantité en Stock</th>
                                <th class="text-left">État</th>
                                <th class="text-left">Images</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($cart as $item)
                                <tr>
                                    <td class="text-left">{{ $item['libelle'] }}</td>
                                    <td class="text-left">{{ number_format($item['prix'], 2, ',', ' ') }} FCFA</td>
                                    <td class="text-left">{{ $item['qttestock'] }}</td>
                                    <td class="text-left">{{ $item['etat'] }}</td>
                                    <td class="text-left">
                                        <img src="{{ asset('photos/'.$item['images'])}}" alt="{{ $item['libelle'] }}" style="width: 100px; height: auto;">
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col invoice-details">
                            <h3>Total à Payer: 25,000 FCFA</h3>
                        </div>
                    </div>

                    <div class="row notices">
                        <div class="notice">
                            <p><strong>Note:</strong> Veuillez récupérer vos produits dans les 24 heures.</p>
                        </div>
                    </div>
                </main>

                <footer>
                    Centre Medico-churirgical d'urologie situé a la Vallée Douala Manga Bell Douala-Bali.
                    TEL: (+ 237) 233 423 389 / 674 068 988 / 698 873 945.
                    SITE WEB: http://www.cmcu-cm.com
                </footer>
            </div>
        </div>
    </div>
</div>

</body>
</html>

