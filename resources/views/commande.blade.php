<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .product-row {
          display: none; /* Cacher les lignes de produits par défaut */
        }
        .product-row td {
          padding: 10px 0;
        }
    </style>
</head>
<body>
    @include("admin")
    <div class="row ms-5 ps-5">
        <div class="row ms-5 ps-5">
            <div class="row ms-1 ps-3">
                <table class="table ms-5 ps-5 mb-5 mt-5">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Numero</th>
                        <th>Whatsapp</th>
                        <th>Email</th>
                        <th>Visibilite</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($produits as $item)
                      <tr>
                          <td>{{ $item['nom'] }}</td>
                          <td>{{ $item['prenom'] }}</td>
                          <td>{{ $item['numero'] }}</td>
                          <td>{{ $item['email'] }}</td>
                          <td>{{ $item['contact_what'] }}</td>
                          <td><button class="btn btn-toggle-products" data-id="{{ $item['id'] }}">voir<i class="fas fa-eye ms-2" style="color:green"></i></button></td>
                      </tr>
                      <tr class="product-row" data-id="{{ $item['id'] }}">
                        <td colspan="6">
                          <table class="table table-sm " style="background-color:azure">
                            <thead>
                              <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Etat</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                               @php $val = 0; @endphp
                                @foreach($item->commandenvs as $com)
                              <tr>
                                <td>{{$com->produit->libelle}}</td>
                                <td>{{$com->prix}}</td>
                                <td>{{$com->qtte}}</td>
                                <td>{{$com->etat}}</td>
                                <td>{{$com->prix * $com->qtte}}</td>
                              </tr>
                              @php $val += $com->prix * $com->qtte; @endphp
                                @endforeach
                              <tr>
                                <td colspan="3" class="text-end">Total</td>
                                <td>{{ $val }}</td>
                                <td><button class="btn btn-toggle-products5" data-id="{{ $item['id'] }}">Traiter<i class="fas fa-check ms-1" style="color:green"></i></button></td>

                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-toggle-products').on('click', function() {
                var id = $(this).data('id');
                var productRow = $('.product-row[data-id="' + id + '"]');
                productRow.toggle(); // Affiche ou cache la ligne de produits
                
           
            });
        });



        $(document).ready(function() {
            $('.btn-toggle-products5').on('click', function() {
                var id = $(this).data('id');
                
                $.ajax({
                    url: 'http://localhost:8000/traiternotif', // Assurez-vous que cette route est correcte
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Inclure le token CSRF
                        id: id
                    },
                    success: function(response) {
                        // Vous pouvez personnaliser la mise à jour de l'interface utilisateur ici
                       
                    },
                    error: function(xhr) {
                        // Affiche l'erreur si la requête échoue
                       
                    }
                });
            });
        });

    </script>
</body>
</html>
